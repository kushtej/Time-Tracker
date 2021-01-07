import React, { useState, useEffect } from 'react';

import Posts from './components/Posts';
import Pagination from './components/Pagination';
import JokesData from './components/Data/JokesData';
import './App.css';

/**
 * Renders Posts and Pagination
 * 
 * @param { void }
 * @return {<DOM>}
 */
const App = () => {
  const [posts, setPosts] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [postsPerPage] = useState(4);

  const indexOfLastPost = currentPage * postsPerPage;
  const indexOfFirstPost = indexOfLastPost - postsPerPage;
  const currentPosts = posts.slice(indexOfFirstPost, indexOfLastPost);
  const paginate = pageNumber => setCurrentPage(pageNumber);

  useEffect(() => {
    const fetchPosts = () => { setPosts(JokesData)  };
    fetchPosts();
  });

  return (
    <div>
      <h1  className="heading">PAGINATION</h1>
      <div className="container">
      <Posts posts={ currentPosts } />
      <Pagination
        postsPerPage={ postsPerPage }
        totalPosts={ posts.length }
        paginate={ paginate }
      />
      </div>
    </div>
  );
};

export default App;
