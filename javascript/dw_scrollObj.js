
dw_scrollObjs = {};
dw_scrollObj.speed = 100; 


function dw_scrollObj(wnId, lyrId, cntId) {
  this.id = wnId; dw_scrollObjs[this.id] = this;
  this.animString = "dw_scrollObjs." + this.id;
  this.load(lyrId, cntId);
}

dw_scrollObj.loadLayer = function(wnId, id, cntId) {
  if ( dw_scrollObjs[wnId] ) dw_scrollObjs[wnId].load(id, cntId);
}

dw_scrollObj.prototype.load = function(lyrId, cntId) {
  if (!document.getElementById) return;
  var wndo, lyr;
  if (this.lyrId) {
    lyr = document.getElementById(this.lyrId);
    lyr.style.visibility = "hidden";
  }
  lyr = document.getElementById(lyrId);
  wndo = document.getElementById(this.id);
  lyr.style.top = this.y = 0; lyr.style.left = this.x = 0;
  this.maxY = (lyr.offsetHeight - wndo.offsetHeight > 0)? lyr.offsetHeight - wndo.offsetHeight: 0;
  this.wd = cntId? document.getElementById(cntId).offsetWidth: lyr.offsetWidth;
  this.maxX = (this.wd - wndo.offsetWidth > 0)? this.wd - wndo.offsetWidth: 0;
  this.lyrId = lyrId;
  lyr.style.visibility = "visible";
  this.on_load(); this.ready = true;
}

dw_scrollObj.prototype.on_load = function() {}  

dw_scrollObj.prototype.shiftTo = function(lyr, x, y) {
  lyr.style.left = (this.x = x) + "px"; 
  lyr.style.top = (this.y = y) + "px";
}


dw_scrollObj.GeckoTableBugFix = function() {
  var i, wndo, holderId, holder, x, y;
	if ( navigator.userAgent.indexOf("Gecko") > -1 && navigator.userAgent.indexOf("Firefox") == -1 ) {
    dw_scrollObj.hold = []; 
    for (i=0; arguments[i]; i++) {
      if ( dw_scrollObjs[ arguments[i] ] ) {
        wndo = document.getElementById( arguments[i] );
        holderId = wndo.parentNode.id;
        holder = document.getElementById(holderId);
        document.body.appendChild( holder.removeChild(wndo) );
        wndo.style.zIndex = 1000;
        x = holder.offsetLeft; y = holder.offsetTop;
        wndo.style.left = x + "px"; wndo.style.top = y + "px";
        dw_scrollObj.hold[i] = [ arguments[i], holderId ];
      }
    }
   window.addEventListener("resize", dw_scrollObj.rePositionGecko, true);
  }
}


dw_scrollObj.rePositionGecko = function() {
  var i, wndo, holder, x, y;
  if (dw_scrollObj.hold) {
    for (i=0; dw_scrollObj.hold[i]; i++) {
      wndo = document.getElementById( dw_scrollObj.hold[i][0] );
      holder = document.getElementById( dw_scrollObj.hold[i][1] );
      x = holder.offsetLeft; y = holder.offsetTop;
      wndo.style.left = x + "px"; wndo.style.top = y + "px";
    }
  }
}