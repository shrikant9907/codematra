// Sort by Date DESC | Codematra.com
users.sort((a, b) => { 
  return (new Date(b.created) < new Date(a.created)) < 0 ? 1 : -1;
});
// console.log(users);