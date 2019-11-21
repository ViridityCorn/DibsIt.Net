CREATE TABLE KundeListe (
    KundeID int,
    Kundenavn varchar(255),
    Ansvarlig varchar(255),
    Adresse varchar(255),
    KundeLogin varchar(255),
    KundeKode varchar(255)
);

INSERT INTO KundeListe(KundeID, Kundenavn, Ansvarlig, Adresse, KundeLogin, KundeKode)
VALUES ('0','Template','David Kirckhoff Foght','Kronborg, Falster','MLGPro123','321')