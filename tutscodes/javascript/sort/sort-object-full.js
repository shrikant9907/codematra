// JavaScript Object of Array | Codematra
let users = [
  {
    name: "James",
    age: 25,
    created: "2021/10/23", 
  },
  {
    name: "David",
    age: 27,
    created: "2000/12/05", 
  },
  {
    name: "Sarah",
    age: 45,
    created: "2010/06/14", 
  },
  {
    name: "Jasmine",
    age: 30,
    created: "2020/10/10", 
  },
  {
    name: "Twinkal",
    age: 20,
    created: "2012/08/07", 
  }
];

// Sort by name ASC | Codematra.com
users = users.sort((a, b) => {
  return (a.name.toLowerCase() > b.name.toLowerCase()) ? 1 : -1;
});
// console.log(users);

// Sort by name DESC | Codematra.com
users = users.sort((a, b) => {
  return (a.name.toLowerCase() < b.name.toLowerCase()) ? 1 : -1;
});
// console.log(users);

// Sort by age ASC | Codematra.com
users = users.sort((a, b) => {
  return (a.age > b.age) ? 1 : -1;
});
// console.log(users);

// Sort by age DESC | Codematra.com
users = users.sort((a, b) => {
  return (a.age < b.age) ? 1 : -1;
});
// console.log(users);

// Sort by Date ASC | Codematra.com
users = users.sort((a, b) => {
  return (new Date(b.created) > new Date(a.created)) ? -1 : 1;
});
// console.log(users); 

// Sort by Date DESC | Codematra.com
users = users.sort((a, b) => { 
  return (new Date(b.created) < new Date(a.created)) < 0 ? 1 : -1;
});
// console.log(users);