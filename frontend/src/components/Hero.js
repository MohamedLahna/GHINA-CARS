import React from 'react';
import { Container, Row, Col, Form, Button, Card } from 'react-bootstrap';

const Hero = ({ onSearch, cars = [] }) => {
  const [marque, setMarque] = React.useState("");
  const [dateDeb, setDateDeb] = React.useState("");
  const [dateFin, setDateFin] = React.useState("");

  // --- MODIFICATION HNA ---
  // Kanqet3o liste bach nakhdo ghir 12 tomobila lwella
  const limitedCars = cars.slice(0, 8); 
  
  // Logic bach nfrqo tonobilat f cercle 360 daraja (daba ghadi t7seb ghir 3la 12 max)
  const carCount = limitedCars.length;
  const radius = 350; // Ch7al b3ad 3la lwst

  const handleClick = () => {
    onSearch(marque, dateDeb, dateFin);
  };

  return (
    <div className="hero-section text-center text-white" style={{ paddingTop: '0px' }}>
      <Container>
        
        {/* L-Animation 3D Yaw */}
        <div className="carousel-3d-container">
          <h1 className="fancy-title display-4 fw-bold">
            VOTRE SATISFACTION <br/> EST NOTRE MÉTIER
          </h1>
          
          <div className="carousel-3d-ring">
            {/* --- KANDIRO MAP 3LA limitedCars FBLAST cars --- */}
            {limitedCars.map((car, index) => {
              const angle = (index * 360) / carCount;
              return (
                <div 
                  key={car.id} 
                  className="car-item-3d shadow-lg"
                  style={{
                    transform: `rotateY(${angle}deg) translateZ(${radius}px)`
                  }}
                >
                  <img src={`http://localhost:8000/storage/${car.image}`} alt={car.marque} />
                </div>
              );
            })}
          </div>
        </div>

        <section className="py-5">
        <Container>
          <div className="vip-gradient text-center">
            <h2 className="text-orange mb-4">LE MOT DU PRÉSIDENT</h2>
            <h4 className="fst-italic fw-light mb-4 px-lg-5">
              « Votre sécurité, votre confort, votre tranquillité ne sont pas
              négociables. Notre personnel et nos véhicules sont irréprochables
              en tous points afin que vous puissiez apprécier en pleine confiance votre voyage. »
            </h4>
            <div className="mt-3">
              <h5 className="fw-bold mb-0">Abdelfatah MICHBAL</h5>
              <span className="text-orange small">CEO / ASSOCIÉ UNIQUE</span>
            </div>
          </div>
        </Container>
      </section>

        <Card className="p-4 shadow-lg bg-hero text-dark border-0 mt-5">
          <Row className="g-3 align-items-end">
            <Col md={3}>
              <Form.Group>
                <Form.Label className="text-light fw-bold">Marque ou Modèle</Form.Label>
                <Form.Control 
                  type="text"
                  placeholder="Ex: Dacia, Range..." 
                  className="bg-input border-0 py-2"
                  value={marque}
                  onChange={(e) => setMarque(e.target.value)} 
                />
              </Form.Group>
            </Col>
            <Col md={3}>
              <Form.Group>
                <Form.Label className="text-light fw-bold">Date Début</Form.Label>
                <Form.Control type="date" className="bg-input border-0 py-2" onChange={(e) => setDateDeb(e.target.value)} />
              </Form.Group>
            </Col>
            <Col md={3}>
              <Form.Group>
                <Form.Label className="text-light fw-bold">Date Fin</Form.Label>
                <Form.Control type="date" className="bg-input border-0 py-2" onChange={(e) => setDateFin(e.target.value)} />
              </Form.Group>
            </Col>
            <Col md={3}>
              <Button className="btn-hero w-100 py-2 shadow" onClick={handleClick}>
                <i className="bi bi-search me-2"></i>🔍RECHERCHER
              </Button>
            </Col>
          </Row>
        </Card>
      </Container>
    </div>
  );
};

export default Hero;