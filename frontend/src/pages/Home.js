import React, { useState, useEffect } from "react";
import axios from "axios";
import Hero from "../components/Hero";
import CarList from "../components/CarList";
import { Container } from "react-bootstrap";

const Home = () => {
  const [allCars, setAllCars] = useState([]); // Had state fih ga3 tomobilat li jayin mn base de données
  const [filteredCars, setFilteredCars] = useState([]);
  const [loading, setLoading] = useState(true);

  // 1. Njibo data mn Laravel ghir t7el lpage
  useEffect(() => {
    const fetchCars = async () => {
      try {
        const response = await axios.get("http://localhost:8000/api/cars");

        console.log(response.data); // Bach tchecki f Console
        setAllCars(response.data);
        setFilteredCars(response.data); // flowl nbiyen kolchi
        setLoading(false);
      } catch (error) {
        console.error("Erreur du get d'api:", error);
        setLoading(false);
      }
    };
    fetchCars();
  }, []);

  // Logic dyal l Filtrage (Marque + Dates)
  const handleSearch = (searchMarq, dateDeb, dateFin) => {
    let result = allCars;

    // Filtrage bla Marque wla Modèle (Ila l  client ktb chi 7aja)
    if (searchMarq && searchMarq.trim() !== "") {
      const searchLow = searchMarq.toLowerCase();
      result = result.filter(
        (car) =>
          (car.marque && car.marque.toLowerCase().includes(searchLow)) ||
          (car.modele && car.modele.toLowerCase().includes(searchLow))
      );
    }

    // Filtrage b-les Dates (L-Logique l-m39ola dyal l-disponibilité)
    if (dateDeb && dateFin) {
      const reqStart = new Date(dateDeb);
      const reqEnd = new Date(dateFin);

      // Kanchoufo b3da wach l client maghletch f les dates
      if (reqEnd >= reqStart) {
        result = result.filter((car) => {
          // Chart 1: Ila kanet tomobila f maintenance (disponibilite === 0 w ma3ndhach dates)
          if (car.disponibilite === 0 && !car.date_debut_location) {
            return false;
          }

          // Chart 2: Ila tomobila mamkriyach ga3 (dates null), raha disponible
          if (!car.date_debut_location || !car.date_fin_location) {
            return true;
          }

          // Chart 3: LCalcul dyal Chevauchement (Overlap)
          const carStart = new Date(car.date_debut_location);
          const carEnd = new Date(car.date_fin_location);

          // Tomobila katban DISPONIBLE ghir fhad 2 7alat:
          // A) Lclient bgha ykriha w yrj3ha QBL ma tbda location li msjla.
          // B) Lclient bgha ykriha B3D matsali location li msjla.
          const isAvailable = reqEnd < carStart || reqStart > carEnd;

          return isAvailable;
        });
      } else {
        // Ila dar date fin sgher mn date debut
        alert("La date de fin doit être supérieure ou égale à la date de début.");
        return; // K-n-wweqfou l-fonction hna
      }
    }

    // Kanssifto résultat jdid l state bach ytafficha f CarList
    setFilteredCars(result);

    // Animation sghira: kanhbtou l client automatiqument l jihet tomobilat bch i chouf résultat
    setTimeout(() => {
        document.getElementById('vehicules')?.scrollIntoView({ behavior: 'smooth' });
    }, 100);
  };

  return (
    <main className="bg-main">
      <Hero onSearch={handleSearch} cars={allCars} />

      {/* Section 1: Flotte*/}
      <section id="vehicules" className="py-5 bg-alliance-zone">
        <CarList voitures={filteredCars} />
      </section>

      {/* Section 2: L'Alliance & Valeurs */}
      <section className="section-premium text-center overflow-hidden bg-flotte-zone">
        <Container>
          <div className="row align-items-center">
            <div className="col-lg-6 text-start">
              <h6 className="text-orange fw-bold">PRÉAMBULE</h6>
              <h2 className="text-white fw-bold display-5 mb-4">
                L'Alliance RGT
              </h2>
              <p className="text-light lead">
                <b className="preamuble">GHINA CARS, GHAYTE CARS & RAK GHALI TRANSPORT</b> est une alliance
                de sociétés chapeautée par un associé unique. Nous nous basons
                sur la satisfaction et la fidélisation.
              </p>
              <div className=" text-light row mt-4">
                {[
                  "Rapidité",
                  "Efficacité",
                  "Fiabilité",
                  "Professionnalisme",
                ].map((v) => (
                  <div className="col-6 mb-2" key={v}>
                    <i className="bi bi-patch-check-fill text-orange me-2">
                    <span>{v}</span></i>
                  </div>
                ))}
              </div>
            </div>
            <div className="col-lg-6">
              <div className="p-4 glass-effect bg-alliance px-4 mt-5">
                  <h6><b className="preamuble">🟨GHINA CARS: </b>location de voitures.</h6>
                  <h6><b className="preamuble">🟨GHAYTE CARS: </b>location de voitures.</h6>
                  <h6><b className="preamuble">🟨RAK GHALI TRANSPORT: </b>transport touristique et personnel.</h6>
              </div>
            </div>
          </div>
        </Container>
      </section>

      {/* Section 3: Service VIP */}
      <section
        id="vip"
        className="section-premium bg-alliance-zone text-white text-center"
      >
        <Container>
          <h2 className="display-6 fw-bold mb-4">
            SERVICE VIP <span className="text-orange">PORTE À PORTE</span>
          </h2>
          <p className="lead mb-5 opacity-75">
            Première société marocaine avec accès aux aérodromes et pistes
            d'atterrissage. Chauffeurs certifiés PCA (ONDA/DAC) dans 13 villes
            du Royaume.
          </p>
          <div className="row g-4">
            {[
              "Accès Pistes",
              "13 Aéroports",
              "Certifié PCA",
              "Luxe Illimité",
            ].map((item) => (
              <div className="col-md-3 col-6" key={item}>
                <div className="p-4 border border-secondary rounded-4 glass-effect">
                  <h5 className="text-orange mb-0 text-center">{item}</h5>
                </div>
              </div>
            ))}
          </div>
        </Container>
      </section>
    </main>
  );
};

export default Home;
