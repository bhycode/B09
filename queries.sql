DROP DATABASE DB9;
CREATE DATABASE DB9;
USE DB9;


create table Ville(
    villeID int primary key AUTO_INCREMENT,
    villeNom varchar(100) not null

);

describe Ville;


create table Entreprise(
    idEn int primary key AUTO_INCREMENT,
    nomEn varchar(50) not null,
    img varchar(70) not null
);

describe Entreprise;



create table Bus(
    busNombre int primary key AUTO_INCREMENT,
    matricule varchar(8) not null,
    busNom varchar(40) not null,
    capac int not null,
    idEn int not null,
    foreign key (idEn) references Entreprise(idEn)
);

describe Bus;



create table Routee(
    routeID int primary key AUTO_INCREMENT,
    distance float(2) not null,
    duree int not null,
    villeDep int not null,
    villeDes int not null,
    foreign key (villeDep) references Ville(villeID),
    foreign key (villeDep) references Ville(villeID)
);

describe Routee;



create table Horaire(
    hr_id int primary key AUTO_INCREMENT,
    hr_dep float(2) not null,
    hr_arv float(2) not null,
    sieges_dispo int not null,
    prix float(2) not null,
    dt varchar(10) not null,
    routeID int not null,
    busID int not null,
    FOREIGN KEY (routeID) references Routee(routeID),
    foreign key (busID) references Bus(busNombre)
);

describe Horaire;




INSERT INTO Ville (villeNom) VALUES
('Casablanca'),
('Fez'),
('Tangier'),
('Marrakesh'),
('Salé'),
('Meknes'),
('Rabat'),
('Oujda'),
('Kenitra'),
('Agadir'),
('Tetouan'),
('Temara'),
('Safi'),
('Mohammedia'),
('Khouribga'),
('El Jadida'),
('Beni Mellal'),
('Aït Melloul'),
('Nador'),
('Dar Bouazza'),
('Settat'),
('Berrechid'),
('Khemisset'),
('Inezgane'),
('Ksar El Kebir'),
('Larache'),
('Guelmim'),
('Khenifra'),
('Berkane'),
('Taourirt'),
('Bouskoura'),
('Fquih Ben Salah'),
('Dcheira El Jihadia'),
('Oued Zem'),
('El Kelaa Des Sraghna'),
('Sidi Slimane'),
('Errachidia'),
('Guercif'),
('Oulad Teima'),
('Ben Guerir'),
('Tifelt'),
('Lqliaa'),
('Taroudant'),
('Sefrou'),
('Essaouira'),
('Fnideq'),
('Sidi Kacem'),
('Tiznit'),
('Tan-Tan'),
('Ouarzazate'),
('Souk El Arbaa'),
('Youssoufia'),
('Lahraouyine'),
('Martil'),
('Ain Harrouda'),
('Suq as-Sabt Awlad an-Nama'),
('Skhirat'),
('Ouazzane'),
('Benslimane'),
('Al Hoceima'),
('Beni Ansar'),
('Mdieq'),
('Sidi Bennour'),
('Midelt'),
('Azrou'),
('Drargua');

SELECT * FROM Ville;


INSERT INTO Entreprise (nomEn, img) VALUES 
('CTM', 'C:/xampp/htdocs/Brief9/assets/imgs/ctm.jpg'),
('TajVoyage', 'C:/xampp/htdocs/Brief9/assets/imgs/taj.jpg'),
('Bismi Allah Salama', 'C:/xampp/htdocs/Brief9/assets/imgs/bismilah.jpg'),
('SAT First', 'C:/xampp/htdocs/Brief9/assets/imgs/SAT_First.jpg'),
('Al Wissam Addahabi', 'C:/xampp/htdocs/Brief9/assets/imgs/AlWissamAddahabi.jpg'),
('Sotram', 'C:/xampp/htdocs/Brief9/assets/imgs/sotram.jpg'),
('Bab Allah', 'C:/xampp/htdocs/Brief9/assets/imgs/BabAllah.jpg'),
('GloBus Trans', 'C:/xampp/htdocs/Brief9/assets/imgs/GloBus.jpg'),
('Supratours', 'C:/xampp/htdocs/Brief9/assets/imgs/Supratours.jpg'),
('Jana Viajes', 'C:/xampp/htdocs/Brief9/assets/imgs/JanaViajes.jpg'),
('Trans Fadila', 'C:/xampp/htdocs/Brief9/assets/imgs/TransFadila.jpg'),
('Itrane Souss', 'C:/xampp/htdocs/Brief9/assets/imgs/ItraneSouss.jpg'),
('Trans Al Yamama', 'C:/xampp/htdocs/Brief9/assets/imgs/TransAlYamama.jpg'),
('Bab Salama', 'C:/xampp/htdocs/Brief9/assets/imgs/BabSalama.jpg');

SELECT * FROM Entreprise;



insert into Bus(busNombre, matricule, busNom, capac, idEn)
VALUES(145, 'B7845154', 'COPS-1', 50, 1),
    (146, 'B7845213', 'COPS-2', 50, 1),
    (147, 'B7845214', 'NIP-1', 50, 2),
    (148, 'B7845215', 'NIP-2', 50, 2),
    (149, 'B7845216', 'SOD-1', 50, 3),
    (789, 'B885216', 'SVERA 1', 70, 4),
    (790, 'B885217', 'SVERA 2', 70, 4),
    (791, 'B885218', 'SER 1', 70, 5),
    (792, 'B885219', 'SER 2', 70, 5),
    (793, 'B885220', 'JIV 1', 70, 6),
    (794, 'B885221', 'GER 1', 70, 7),
    (795, 'B885224', 'LONE 1', 70, 8),
    (796, 'B885225', 'LONE 2', 70, 8),
    (797, 'B885226', 'KIV 1', 70, 9),
    (798, 'B885227', 'KIV 2', 70, 9),
    (799, 'B885228', 'KLD 7', 70, 10),
    (800, 'B885229', 'KLD 8', 70, 10),
    (801, 'B885230', 'SAF 7', 70, 11),
    (802, 'B885231', 'SAF 8', 70, 11),
    (803, 'B885232', 'OPE 7', 70, 12),
    (804, 'B885233', 'OPE 8', 70, 12),
    (805, 'B885234', 'HIP 7', 70, 13),
    (806, 'B885235', 'HIP 8', 70, 13),
    (807, 'B885236', 'MLA 7', 70, 14),
    (808, 'B885237', 'MLA 8', 70, 14);

SELECT * FROM Bus;


SELECT h.*, e.nomEn from Horaire as h, routee as r, bus as b, Entreprise as e where h.routeID = r.routeID and r.villeDep = "Safi" and r.villeDes = "Casablanca" and h.dt = "2021-10-15" and h.sieges_dispo = 5 and h.busID = b.busNombre and b.idEn = e.idEn;



-- http://localhost/Brief9/travels.php?departureCity=404&destinationCity=438&departureDate=2024-01-01&numberOfTravelers=10