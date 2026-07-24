import React from "react";
import { Navbar, Nav, Container } from "react-bootstrap";

const NavigationBar = () => {
  return (
    <Navbar className="bg-navy py-3" variant="dark" expand="lg" sticky="top">
      <Container>
        <Navbar.Brand href="#home" className="d-flex align-items-center">
          <img
            src={process.env.PUBLIC_URL + "/logoGC.png"}
            className="logo-ghina me-2"
            alt="GHINA Logo"
          />
          <div className="d-flex flex-column">
            <span
              className="text-orange fw-bold fs-4 mb-0"
              style={{ lineHeight: 1 }}
            >
              GHINA CARS
            </span>
            <small
              className="text-white opacity-50"
              style={{ fontSize: "10px" }}
            >
              RGT ALLIANCE
            </small>
          </div>
        </Navbar.Brand>
        <Navbar.Toggle />
        <Navbar.Collapse>
          <Nav className="ms-auto">
            <Nav.Link href="/" className="px-3">
              Accueil
            </Nav.Link>
            <Nav.Link href="/#vehicules" className="px-3">
              Notre Flotte
            </Nav.Link>
            <Nav.Link
              href="/#vip"
              className="px-3 text-orange fw-bold border border-orange rounded-pill ms-lg-2"
            >
              Services VIP
            </Nav.Link>
            <Nav.Link href="/marques" className="px-3" to="/marques">
              Marques
            </Nav.Link>
            
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
};

export default NavigationBar;
