import React, { useState, useEffect } from 'react'

function App() {

  const [posts, setPosts] = useState([]);

  const style = {
    fontSize:20,
    padding: 10
  }

  useEffect(() => {

    fetch('https://jsonplaceholder.typicode.com/posts')
    .then(res => res.json())
    .then(data => {
      setPosts(data);      
    }).catch(error => console.log(error))

  }, [posts])

  return (
    <>
      <h1>Posts</h1>
      <ul>
      {
        posts ? posts.slice(0, 10).map((post, index) => {
          return <li style={style} key={ index }>{ post.title}</li>
        })
        :
        'Loading Posts'
      }   
      </ul> 
    </>
  );
}

export default App;
