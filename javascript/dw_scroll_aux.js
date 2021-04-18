
dw_scrollObj.prototype.bSizeDragBar = true;

dw_scrollObj.prototype.setUpScrollbar = function(id, trkId, axis, offx, offy) {
  if (!document.getElementById) return;
  var bar = document.getElementById(id);
  var trk = document.getElementById(trkId);
  dw_slidebar.init(bar, trk, axis, offx, offy);
 
  bar.wn = dw_scrollObjs[this.id]; 
  if (axis == "v") this.vBarId = id; else this.hBarId = id;
 
  if (this.bSizeDragBar) this.setBarSize();
  bar.on_drag_start = bar.on_slide_start = dw_scrollObj.getWndoLyrRef;
  bar.on_drag_end =   bar.on_slide_end =   dw_scrollObj.tossWndoLyrRef;
  bar.on_drag =       bar.on_slide =       dw_scrollObj.UpdateWndoLyrPos;
}


dw_scrollObj.getWndoLyrRef = function()  { this.wnLyr = document.getElementById(this.wn.lyrId); }
dw_scrollObj.tossWndoLyrRef = function() { this.wnLyr = null; }

dw_scrollObj.UpdateWndoLyrPos = function(x, y) {
  var nx, ny;
  if (this.axis == "v") {
    nx = this.wn.x; 
    ny = -(y - this.minY) * ( this.wn.maxY / (this.maxY - this.minY) ) || 0;
  } else {
    ny = this.wn.y;
    nx = -(x - this.minX) * ( this.wn.maxX / (this.maxX - this.minX) ) || 0;
  }
  this.wn.shiftTo(this.wnLyr, nx, ny);
}


dw_scrollObj.prototype.updateScrollbar = function(x, y) {
  var nx, ny;
  if ( this.vBarId ) {
    if (!this.maxY) return;
    ny = -( y * ( (this.vbar.maxY - this.vbar.minY) / this.maxY ) - this.vbar.minY );
    ny = Math.min( Math.max(ny, this.vbar.minY), this.vbar.maxY);  
    nx = parseInt(this.vbar.style.left);
    this.vbar.style.left = nx + "px"; this.vbar.style.top = ny + "px";
  } if ( this.hBarId ) {
    if (!this.maxX) return;
    nx = -( x * ( (this.hbar.maxX - this.hbar.minX) / this.maxX ) - this.hbar.minX );
    nx = Math.min( Math.max(nx, this.hbar.minX), this.hbar.maxX);
    ny = parseInt(this.hbar.style.top);
    this.hbar.style.left = nx + "px"; this.hbar.style.top = ny + "px";
  } 
  
}


dw_scrollObj.prototype.restoreScrollbars = function() {
  var bar;
  if (this.vBarId) {
    bar = document.getElementById(this.vBarId);
    bar.style.left = bar.minX + "px"; bar.style.top = bar.minY + "px";
  }
  if (this.hBarId) {
    bar = document.getElementById(this.hBarId);
    bar.style.left = bar.minX + "px"; bar.style.top = bar.minY + "px";
  }
}
  

dw_scrollObj.prototype.setBarSize = function() {
  var bar;
  var lyr = document.getElementById(this.lyrId);
  var wn = document.getElementById(this.id);
  if (this.vBarId) {
    bar = document.getElementById(this.vBarId);
    bar.style.height = (lyr.offsetHeight > wn.offsetHeight)? bar.trkHt / ( lyr.offsetHeight / wn.offsetHeight ) + "px": bar.trkHt - 2*bar.minY + "px";
    bar.maxY = bar.trkHt - bar.offsetHeight - bar.minY; 
  }
  if (this.hBarId) {
    bar = document.getElementById(this.hBarId);
    bar.style.width = (this.wd > wn.offsetWidth)? bar.trkWd / ( this.wd / wn.offsetWidth ) + "px": bar.trkWd - 2*bar.minX + "px";
    bar.maxX = bar.trkWd - bar.offsetWidth - bar.minX; 
  }
}


dw_scrollObj.prototype.on_load = function() { 
  this.restoreScrollbars();
  if (this.bSizeDragBar) this.setBarSize();
}

dw_scrollObj.prototype.on_scroll = dw_scrollObj.prototype.on_slide = function(x,y) { this.updateScrollbar(x,y); }


dw_scrollObj.prototype.on_scroll_start = dw_scrollObj.prototype.on_slide_start = function() {
  if ( this.vBarId ) this.vbar = document.getElementById(this.vBarId);
  if ( this.hBarId ) this.hbar = document.getElementById(this.hBarId);
}

dw_scrollObj.prototype.on_scroll_end = dw_scrollObj.prototype.on_slide_end = function(x, y) { 
  this.updateScrollbar(x,y);
  this.lyr = null; this.bar = null; 
}

