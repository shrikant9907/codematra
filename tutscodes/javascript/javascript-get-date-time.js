// Get Current Date and Time | https://codematra.com/
const getCurrentDateTime = (type="date") => {

  let today = new Date(); // Default current date

  // it will return date
  if (type === 'date') {
    let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    return date;
  }
  
  // it will return time
  if (type === 'time') {
    let hours = today.getHours();
    let minutes = today.getMinutes();
    let time = hours + ":" + minutes;
    let ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0'+minutes : minutes;
    time = hours + ':' + minutes + ' ' + ampm;
    return time;
  }

  // it will return datetime
  if (type === 'dateTime') {

    // Date
    let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    // Time
    let hours = today.getHours();
    let minutes = today.getMinutes();
    let time = hours + ":" + minutes;
    let ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0'+minutes : minutes;
    time = hours + ':' + minutes + ' ' + ampm;

    let dateTime = date +' '+ time;
    return dateTime;
  }

  return today;

}