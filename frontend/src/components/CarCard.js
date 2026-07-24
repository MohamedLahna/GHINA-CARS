import React, { useState } from 'react';
import { Card, Button, Badge } from 'react-bootstrap';

const CarCard = ({ marque, image, prix, etat, statut_actuel }) => {
  const [isHovered, setIsHovered] = useState(false);

  const getStatutColor = () => {
    if (statut_actuel === 'Disponible') return 'success';
    if (statut_actuel.includes('Louée')) return 'danger';
    return 'warning';
  };

  const reserverEmail = () => {
    const email = "ghina.cars@gmail.com"; 
    const subject = encodeURIComponent(`Réservation : ${marque}`);
    const message = `Bonjour,\n\nJe souhaite réserver la voiture ${marque}.\nMerci de me recontacter pour confirmer la disponibilité.\n\nPrix affiché : ${prix} DH/Jour.`;
    const body = encodeURIComponent(message);

    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

    if (isMobile) {
      window.open(`mailto:${email}?subject=${subject}&body=${body}`, '_blank');
    } else {
      const gmailLink = `https://mail.google.com/mail/?view=cm&fs=1&to=${email}&su=${subject}&body=${body}`;
      window.open(gmailLink, '_blank');
    }
  };

  
 return (
    <Card 
      className="shadow-sm mb-4 border-0" 
      style={{ 
        borderRadius: '15px', 
        overflow: 'hidden',
        backgroundColor: '#1a1a2e',
        transform: isHovered ? 'translateY(-10px)' : 'translateY(0)',
        transition: 'all 0.3s ease'
      }}
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
    >
      <div style={{ position: 'relative', height: '220px' }}>
        <Card.Img 
          variant="top" 
          src={`http://localhost:8000/storage/${image}`} 
          style={{ height: '100%', objectFit: 'cover' }} 
        />
        
        <div className="position-absolute top-0 w-100 p-3 d-flex justify-content-between align-items-start">
          <Badge bg="info" className="px-2 py-1 shadow-sm">
            {etat}
          </Badge>

          <Badge bg={getStatutColor()} className="px-3 py-2 shadow-sm fs-6">
            {statut_actuel}
          </Badge>
        </div>
      </div>

      <Card.Body className="p-4 d-flex flex-column">
        <h4 className="fw-bold text-white mb-3">{marque}</h4>
        
        <div className="d-flex justify-content-between align-items-center mb-4">
          <span className="text-light opacity-50">Prix Journalier</span>
          <h3 className="fw-bold text-orange mb-0">{prix} DH</h3>
        </div>

        <div className="d-grid gap-2">
          <Button 
            className="btn-orange fw-bold py-2"
            disabled={statut_actuel !== 'Disponible'}
          onClick={() => {
            const message = `Réservation de: ${marque}\nPrix: ${prix} DH/J\nEtat: ${etat}`;
            window.open(`https://wa.me/212675039707?text=${encodeURIComponent(message)}`, '_blank');
          }}          >
            {statut_actuel === 'Disponible' ? 'Réserver via WhatsApp' : 'Véhicule Occupé'}
          </Button>
          <Button 
            variant="outline-light" 
            className="fw-bold py-2 opacity-75"
            onClick={reserverEmail}
            disabled={statut_actuel === 'Louée' || statut_actuel === 'Maintenance'}
          >
            Réserver via Email
          </Button>
        </div>
      </Card.Body>
    </Card>
  );
};

export default CarCard;
