import React, { useState, useEffect } from 'react';
import axios from 'axios';

const Marque = () => {
  const [marqueList, setMarqueList] = useState([]);

  useEffect(() => {
    const fetchMarques = async () => {
      try {
        const response = await axios.get('http://localhost:8000/api/marques');
        setMarqueList(response.data);
      } catch (error) {
        console.error("Erreur d'API !:", error);
      }
    };

    fetchMarques();
  }, []);

  return (
    <div className="py-5" style={{ backgroundColor: '#f8f9fa' }}>
      <div className="container">
        <div className="text-center mb-5">
          <h2 className="fw-bold" style={{ color: '#272435' }}><i>Nos Marques de Prestige</i></h2>
          <i className="text-muted">Découvrez la diversité de notre flotte à travers les plus grands constructeurs mondiaux.</i>
        </div>

        <div className="row justify-content-center align-items-center text-center g-4">
          {marqueList.length > 0 ? (
            marqueList.map((marque) => (
              <div key={marque.id} className="col-6 col-md-4 col-lg-3">
                <div 
                  className="p-4 bg-white shadow-sm rounded d-flex justify-content-center align-items-center" 
                  style={{ height: '120px', transition: 'transform 0.3s' }}
                  onMouseEnter={(e) => e.currentTarget.style.transform = 'translateY(-5px)'}
                  onMouseLeave={(e) => e.currentTarget.style.transform = 'translateY(0)'}
                >
                  <img 
                    src={`http://localhost:8000/storage/${marque.image}`} 
                    alt={`Logo ${marque.name}`} 
                    className="img-fluid" 
                    style={{ 
                      maxHeight: '60px', 
                      maxWidth: '100%',
                      filter: 'grayscale(100%) opacity(70%)', 
                      transition: 'all 0.3s ease-in-out' 
                    }}
                    onMouseEnter={(e) => e.currentTarget.style.filter = 'grayscale(0%) opacity(100%)'}
                    onMouseLeave={(e) => e.currentTarget.style.filter = 'grayscale(100%) opacity(70%)'}
                  />
                </div>
              </div>
            ))
          ) : (
            <p>Chargement des marques...</p>
          )}
        </div>
      </div>
    </div>
  );
};

export default Marque;
