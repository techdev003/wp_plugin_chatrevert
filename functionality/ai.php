<?php
function ai(){
?>
<style>
    /* Homepage CSS */

/* Hero Styles */
.hero {
  margin-left: 11%;
  /* padding: 1rem 1rem; */
  text-align: center;
  /* background-color: #f2f2f2; */
  /* margin-top: 0px; */
}

.hero h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
}
.hero p {
  margin-bottom: 2rem;
}
.hero button {
  display: inline-block;
  padding: 1rem 2rem;
  font-size: 1.2rem;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
.hero button:hover {
  background-color: #555;
}

.h2{
    margin-left: 50%;
    margin-top: 2rem;
    font-size: 3em;
    margin-bottom: 0;
}

/* Features Styles */
.features {
  padding: 1rem 1rem;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-left: 15%;
}
.features h2 {
  font-size: 2rem;
  margin-top: 50px;
  margin-bottom: 1rem;
}
.feature {
  flex-basis: 30%;
  padding: 2rem;
  margin: 1rem;
  /* background-color: #f2f2f2; */
  text-align: center;
}
.feature h3 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
}
.feature p {
  margin-bottom: 1rem;
}

/* Footer Styles */
footer {
  margin-top: 100px;
  /* padding: 0rem; */
  text-align: center;
  /* background-color: #333; */
  color: #fff;
  width: 100%;
  
}
footer p {
  margin-left:  15%;;
}
</style>
<section className="hero">
              <h1>Welcome to ChatGPT</h1>
              <p>Your personal AI language model</p>
              <Link url="/chatgpt" exactMatch>
                <button >Start Chatting</button>
              </Link>
            </section>
            <h2 className="h2">Features</h2>
            <section className="features">
              <div className="feature">
                <h3>Natural Language Processing</h3>
                <p>ChatGPT uses advanced NLP algorithms to understand and respond to your queries in natural language.</p>
              </div>
              <div className="feature">
                <h3>24/7 Availability</h3>
                <p>ChatGPT is always available to answer your questions, no matter what time of day or night.</p>
              </div>
              <div className="feature">
                <h3>Customizable Responses</h3>
                <p>You can customize ChatGPT's responses to match your brand's tone and voice.</p>
              </div>
            </section>

<?php
}


?>