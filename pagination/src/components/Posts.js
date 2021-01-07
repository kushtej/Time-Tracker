import React from 'react';

const Posts = ({ posts }) => {

  return (
    <div className="print-posts" >
      {posts.map(post => (
        <p className="post" key={post.id}>
          {post.title}
        </p>
      ))}
    </div>
  );
};

export default Posts;
