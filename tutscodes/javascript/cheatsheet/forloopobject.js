const users = [
  {
    name: "James",
    age: 25,
  },
  {
    name: "David",
    age: 27,
  },
  {
    name: "Sarah",
    age: 45,
  },
];

const usersLength = users.length;

// For Loop with array of objects
for (let i = 0; i < usersLength; i++ ) {
  console.log(users[i].name, users[i].age);
} 