import $ from 'jquery';
import { Accordion } from 'flowbite';
const advancedScroller = $('#accordion-advanced-search .scrollbox');
const accordionItems = $('#accordion-advanced-search .advanced-group');
const items = [];
accordionItems.each(function () {
  items.push({
    id: $(this).attr('id'),
    triggerEl: $(this).find('h2')[0],
    targetEl: $(this).find('>div')[0],
  });
});
const accordion = new Accordion(
  document.getElementById('accordion-advanced-search'),
  items,
  {
    activeClasses: 'bg-white text-[var(--Primary-02)]',
    inactiveClasses: 'text-[var(--Gray-01)]',
    onOpen: (item) => {
      const activeItem = item._items.find((item) => item.active);
      const icons = $('#accordion-advanced-search .icon');
      icons.removeClass('rotate-180');
      const icon = $(activeItem.triggerEl).find('.icon');
      icon.addClass('rotate-180');
      const offsetTop = activeItem.triggerEl.offsetTop;
      if (offsetTop < advancedScroller.scrollTop()) {
        advancedScroller.scrollTop({
          top: offsetTop - 50,
          behavior: 'smooth',
        });
      }
    },
    onClose: (item) => {
      const icons = $('#accordion-advanced-search .icon');
      icons.removeClass('rotate-180');
    },
  },
  {}
);

const searchFormHolder = $('#search');
const searchForm = searchFormHolder.find('form');

const advancedBtn = searchForm.find('.advanced-btn');

const advancedGroups = searchForm.find('.advanced-group');

advancedBtn.on('click', function () {
  searchForm.toggleClass('advanced');
  $('body').toggleClass('overflow-hidden');
});

advancedGroups.each(function () {
  const $this = $(this);
  const groupCounter = $this.find('.advanced-count');
  const inputs = $this.find('input');
  inputs.on('change', function () {
    const checked = inputs.filter(':checked').length;
    if (checked > 0) {
      groupCounter.removeClass('hidden');
    } else {
      groupCounter.addClass('hidden');
    }
    groupCounter.text(checked);
  });
});

searchForm.on('submit', function (e) {
  e.preventDefault();
  const $this = $(this);
  const checked = $this.find('input:checked');
  const keyword = $this.find('#searchinput').val();
  const queries = [
    {
      name: 'tim',
      value: [1],
    },
  ];
  if (keyword) {
    queries.push({
      name: 'keyword',
      value: [keyword],
    });
  }
  if (checked.length > 0) {
    checked.each(function () {
      const $this = $(this);
      const oldQuery = queries.find(function (query) {
        return query.name === $this.attr('name');
      });
      if (oldQuery) {
        oldQuery.value.push($this.attr('value'));
      } else {
        queries.push({
          name: $this.attr('name'),
          value: [$this.attr('value')],
        });
      }
    });
  }
  // join queries
  const query = queries.map(function (query) {
    return query.name + '=' + query.value.join(',');
  });

  // redirect to search page
  const target = searchForm.attr('action') + '?' + query.join('&');
  window.location.href = target;
});
