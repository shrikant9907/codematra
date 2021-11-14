// Sort by name ASC | Codematra.com
users.sort((a, b) => {
  return (a.name.toLowerCase() > b.name.toLowerCase()) ? 1 : -1;
});
// console.log(users);