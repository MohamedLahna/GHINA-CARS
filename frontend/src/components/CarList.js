import React, { useState } from 'react';
import { Container, Row, Col, Pagination } from 'react-bootstrap';
import CarCard from './CarCard';


const CarList = ({ voitures }) => {
  const [currentPage, setCurrentPage] = useState(1);
  const carsPerPage = 6;

  const indexOfLastCar = currentPage * carsPerPage;
  const indexOfFirstCar = indexOfLastCar - carsPerPage;
  
  const currentCars = voitures.slice(indexOfFirstCar, indexOfLastCar);

  const totalPages = Math.ceil(voitures.length / carsPerPage);

  const paginate = (pageNumber) => {
    setCurrentPage(pageNumber);
    window.scrollTo({ top: document.getElementById('vehicules').offsetTop - 100, behavior: 'smooth' });
  };

  return (
    <Container className="py-5 border-flotte" id="vehicules">
      <h2 className="text-center fw-bold text-orange mb-5">Notre Flotte</h2>
      
      <Row>
        {currentCars.length > 0 ? (
          currentCars.map((voiture) => (
            <Col key={voiture.id} xs={12} md={6} lg={4} className="mb-4">
              <CarCard {...voiture} />
            </Col>
          ))
        ) : (
          <Col className="text-center py-5">
            <h4 className="text-muted">Aucune voiture trouvée pour ces critères.</h4>
          </Col>
        )}
      </Row>

      {totalPages > 1 && (
        <div className="d-flex justify-content-center mt-5">
          <Pagination style={{ '--bs-pagination-bg': '#272435', '--bs-pagination-border-color': '#b88938' }}>
            <Pagination.Prev 
              onClick={() => paginate(currentPage - 1)} 
              disabled={currentPage === 1}
            />
            
            {[...Array(totalPages)].map((_, index) => (
              <Pagination.Item 
                key={index + 1} 
                active={index + 1 === currentPage}
                onClick={() => paginate(index + 1)}
                style={{ '--bs-pagination-active-bg': '#b88938', '--bs-pagination-active-border-color': '#b88938' }}
              >
                {index + 1}
              </Pagination.Item>
            ))}

            <Pagination.Next 
              onClick={() => paginate(currentPage + 1)} 
              disabled={currentPage === totalPages}
            />
          </Pagination>
        </div>
      )}
    </Container>
  );
};

export default CarList;
