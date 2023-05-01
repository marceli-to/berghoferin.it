import Swiper, { Navigation } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

const swiper = new Swiper('.swiper', {
  modules: [Navigation],
  direction: 'horizontal',
  spaceBetween: 16,
  loop: true,
  navigation: {
    nextEl: '.btn-swiper-next',
    prevEl: '.btn-swiper-prev',
  },
});