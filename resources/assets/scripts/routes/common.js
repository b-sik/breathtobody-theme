import simpleParallax from 'simple-parallax-js';

export default {
  init() {},
  finalize() {
    var image = document.getElementsByClassName('hero-img');
    new simpleParallax(image, {
      delay: .6,
    });
  },
};
