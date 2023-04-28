(function () {

  const selectors = {
    btn: '[data-toggle-btn]',
    target: '[data-toggle-target]'
  };

  const init = () => {
    const btn = document.querySelector(selectors.btn);
    if (!btn) return;
    btn.addEventListener('click', toggle);
  };

  const toggle = () => {
    const target = document.querySelector(selectors.target);
    target.classList.toggle('hidden');
    const btn = document.querySelector(selectors.btn);
    btn.classList.toggle('hidden');
  };

  init();
  
})();