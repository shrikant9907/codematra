// Sort by name DESC | Codematra.com
users = users.sort((a, b) => {
  return (a.name.toLowerCase() < b.name.toLowerCase()) ? 1 : -1;
});
// console.log(users);