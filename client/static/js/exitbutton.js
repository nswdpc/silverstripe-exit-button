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
    this.handleUseEscape();
    this.exitButton.addEventListener(
      'click',
      function(e) {
        e.preventDefault();
        _self.doExit(this);
      }
    );
  }

  handleUseEscape() {

    if(this.exitButton.dataset.useEsc == '0') {
      return false;
    }

    let _self = this;
    let lastEscTime = 0;
    let escWindow = 1000;
    window.addEventListener(
      'keydown',
      function(e) {
        if(e.key == 'Escape') {
          let currentTime = Date.now();
          let timeDiff = currentTime - lastEscTime;
          if(lastEscTime > 0 && timeDiff > 0 && timeDiff < escWindow) {
            lastEscTime = 0;
            _self.doExit();
          } else {
            lastEscTime = currentTime;
          }
        }
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
    window.open(url, '_blank');
    window.location.replace(url, "_newtab");
  }
}
