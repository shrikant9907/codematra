// Remove Empty Values From Array | https://codematra.com/
const removeEmptyItemsFromArray = (array) => {
  let newArray = array;
  if (array.length > 0) {
    newArray = array.filter(item => {
      if (item && item !== "") {
        return true;
      }
      return false;
    });
  }
  return newArray;
}