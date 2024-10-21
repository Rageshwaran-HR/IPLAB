import React, { useState } from "react";
import "./App.css";

function App() {
  const [count, setCount] = useState(0);

  const handleClick = () => {
    setCount(count + 1); // Update state
  };

  return (
    <div className="App">
      <h1>Count: {count}</h1>
      <button onClick={handleClick}>Increment Count</button>
    </div>
  );
}

export default App;
