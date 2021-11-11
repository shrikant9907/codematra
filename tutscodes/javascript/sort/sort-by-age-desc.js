// Sort by age DESC | Codematra.com
users = users.sort((a, b) => {
  return (a.age < b.age) ? 1 : -1;
});
// console.log(users);