var employee = {    // Object we want to destructure
  firstname: 'Jon',
  lastname: 'Snow',
  dateofbirth: '1990'
}; 
// Destructuring the object into variables with
// different names than the object variables

var { firstname: fn, lastname: ln, dateofbirth: dob } = employee;
console.log( fn, ln, dob);  