import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import NavigationBar from "./components/Navbar";
import Marque from './components/Marque';
import Home from "./pages/Home";
import "./App.css";

function App() {
  return (
    <Router>
      <div className="App">
        {/* L Header dima lfo9 */}
        <NavigationBar />

        <Routes>
          {/* L page d'acceuil */}
          <Route path="/" element={<Home />} />
          <Route path="/marques" element={<Marque />} />
        </Routes>

        <footer className="bg-flotte-zone py-5 ">
          <div className="container-fluid d-flex justify-content-center ">
            <div className="footer-card ">
              <h6 className="footer-heading text-center text-start">
                Á propos
              </h6>

              <div className="footer-contact text-center text-md-start">
                <p className="footer-text">
                  <br></br>
                  <b>13 villes et aéroports au Maroc</b>
                </p>

                <p className="footer-text">
                  Siege social:{" "}
                  <p>
                    <b>
                      N°5 Residence al Amira 3 Boulevard Yacoub El Mansour
                      Gueliz-Marrakech
                    </b>
                  </p>
                </p>

                <p className="footer-text">
                  Succursale 1:{" "}
                  <p>
                    <b>131.Rue Al Ourjouane Hay Raha Beausijour Casablanca</b>
                  </p>
                </p>

                <p className="footer-text">
                  Succursale 2:{" "}
                  <p>
                    <b>N°6 Rue Araiss rdc,Rabat</b>
                  </p>
                </p>

                <p className="footer-text ">
                  Tel:{" "}
                  <p>
                    <b>+212 5 24 43 78 53</b>
                  </p>
                </p>
              </div>

              <hr className="footer-divider" />

              <p className="text-center small mb-0 footer-copy">
                © 2026 GHINA CARS
              </p>
            </div>
          </div>
        </footer>
      </div>
    </Router>
  );
}

export default App;
