(function($) {
  'use strict';
  
  function _processItems(pItems) {
    
    for (var i=0;i<pItems.length;i++) {
      var item = pItems[i];
      
      item.hasChildren = function() {
        return (this.children && this.children.length > 0);
      }.bind(item);
      
      if (item.hasChildren()) {
        _processItems(item.children);
      }
    }
  }
  
  function Nav(pData) {
    $.extend(this, pData);
    
    _processItems(pData.items);
  }
  
  window.smNav = Nav;
  
})(jQuery);