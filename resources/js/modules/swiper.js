import Swiper, { Navigation, Autoplay } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

const swiper = new Swiper('.swiper', {
  modules: [Navigation, Autoplay],
  direction: 'horizontal',
  spaceBetween: 30,
  loop: true,
  autoplay: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});