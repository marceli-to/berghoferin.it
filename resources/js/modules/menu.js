(function () {

  const selectors = {
    btn: '[data-menu-btn]',
    menu: '[data-menu]'
  };

  const init = () => {
    const btn = document.querySelector(selectors.btn);
    btn.addEventListener('click', toggle);

    // hide on outside menu click
    const menu = document.querySelector(selectors.menu);
    menu.addEventListener('click', (e) => {
      if (e.target === menu || e.target.parentNode === menu) {
        hide();
      }
    });

    // handle escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        hide();
      }
    });
  };

  const toggle = () => {
    const menu = document.querySelector(selectors.menu);
    menu.classList.toggle('is-visible');
    const btn = document.querySelector(selectors.btn);
    btn.classList.toggle('is-active');
  };

  const hide = () => {
    const menu = document.querySelector(selectors.menu);
    menu.classList.remove('is-visible');
    const btn = document.querySelector(selectors.btn);
    btn.classList.remove('is-active');
  };


  init();
  
})();