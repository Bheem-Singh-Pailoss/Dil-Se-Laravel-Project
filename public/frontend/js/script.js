function animate(obj, initVal, lastVal, duration) {
    let startTime = null;
    let currentTime = Date.now();
    const step = (currentTime ) => {
        if (!startTime) {
            startTime = currentTime ;
        }
        const progress = Math.min((currentTime - startTime)/ duration, 1);
        obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal) + '+';
        if (progress < 1) {
            window.requestAnimationFrame(step);
        } else {
            window.cancelAnimationFrame(window.requestAnimationFrame(step));
        }
    };
    window.requestAnimationFrame(step);
}
let url = window.location.pathname;
  const fetch_extra_items_data = async (ajax_value) => {
      let cart_ajx_url = jQuery('#cart_ajx_url').val();
      const resPose = await Ajax_response(cart_ajx_url, "POST", ajax_value, '');
      jQuery(`#myTabContent`).empty().html(resPose);
      jQuery('.product_checkout').slick({
          arrows: true,
          dots: false,
          slidesToShow: 4,
          prevArrow: '<button class="slide-arrow prev-arrow"></button>',
          nextArrow: '<button class="slide-arrow next-arrow"></button>'
      });
  };

async function state_dependency_country_list(ajax_post, url) {
    const response = await Ajax_response(url, "POST", ajax_post, '');
    jQuery(`#billing_state`).empty().html(response);
}
