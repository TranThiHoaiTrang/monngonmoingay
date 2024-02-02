import 'slick-carousel';
import $ from 'jquery';
import { isMobile } from './helper';

// Slider 1

const slider1 = $('.slider-1');

slider1.each(function () {
  if (isMobile()) return;
  const slider = $(this);
  slider.slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: slider.parent().find('.btn-prev'),
    nextArrow: slider.parent().find('.btn-next'),
  });
});

// Slider 2

const slider2 = $('.slider-2');

slider2.each(function () {
  if (isMobile()) return;
  const slider = $(this);
  slider.slick({
    infinite: false,
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow: slider.parent().find('.btn-prev'),
    nextArrow: slider.parent().find('.btn-next'),
  });
});

// Slider 3
const slider3 = $('.slider-3');

slider3.each(function () {
  if (isMobile()) return;
  const slider = $(this);
  slider.slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: slider.parent().find('.btn-prev'),
    nextArrow: slider.parent().find('.btn-next'),
  });
});

// Slider 4
const slider4 = $('.slider-4');

slider4.each(function () {
  if (isMobile()) return;
  const slider = $(this);
  slider.slick({
    infinite: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: slider.parent().find('.btn-prev'),
    nextArrow: slider.parent().find('.btn-next'),
  });
});
