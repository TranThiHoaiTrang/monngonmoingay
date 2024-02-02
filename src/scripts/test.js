const boxSearch = $('.box-search-filter');
const titles = boxSearch.find('.evtshowsubtype');

const data = [];
titles.each(function () {
  const titleData = {};
  const title = $(this);
  const titleText = title.text();
  const titleId = title.data('id');
  titleData.id = titleId;
  titleData.title = titleText;
  titleData.subTitles = [];
  titleData.items = [];
  const titleHolder = title.next();
  const subTitles = titleHolder.find('.row-taxonomy');
  if (subTitles.length === 0) {
    delete titleData.subTitles;
    const items = titleHolder.find('li');
    items.each(function () {
      const itemData = {};
      const item = $(this);
      const itemText = item.text();
      const itemValue = item.find('input').data('name');
      itemData.title = itemText;
      itemData.value = itemValue;
      titleData.items.push(itemData);
    });
  } else {
    delete titleData.items;
    subTitles.each(function () {
      const subTitleData = {};
      const subTitle = $(this);
      const subTitleText = subTitle.find('h3').text();
      subTitleData.title = subTitleText;
      subTitleData.items = [];
      const items = subTitle.find('li');
      items.each(function () {
        const itemData = {};
        const item = $(this);
        const itemText = item.text();
        const itemValue = item.find('input').data('name');
        itemData.title = itemText;
        itemData.value = itemValue;
        subTitleData.items.push(itemData);
      });
      titleData.subTitles.push(subTitleData);
    });
  }
  data.push(titleData);
});
console.log(JSON.stringify(data));
