// Sort by Date ASC | Codematra.com
users.sort((a, b) => {
  return (new Date(b.created) > new Date(a.created)) ? -1 : 1;
});
// console.log(users); 