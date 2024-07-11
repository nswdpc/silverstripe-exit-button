/**
 * Exit Button
 */
class ExitButton {
  exitButton = null
  init(btn) {
    try {
      if(!btn) {
        throw 'Parameter is not an element';
      }
      this.exitButton = btn;
    } catch (e) {
      console.warn('ExitButton', e);
    }
    return this;
  }
  handle() {
    if(!this.exitButton) {
      throw 'No button defined';
    }
    let _self = this;
    window.addEventListener(
      'keydown',
      function(e) {
        if(e.keyCode == 27) {
          _self.doExit()
        }
      }
    );
    this.exitButton.addEventListener(
      'click',
      function(e) {
        e.preventDefault();
        _self.doExit(this);
      }
    );
  }
  doExit(element) {
    let url = '';
    if(this.exitButton) {
      url = this.exitButton.dataset.url;
    }
    if(!url) {
      url = 'https://www.google.com/';
    }
    console.log(url);
    window.open(url, '_blank');
    window.location.replace(url, "_newtab");
  }
}
