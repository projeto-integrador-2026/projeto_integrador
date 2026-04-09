CREATE TABLE IF NOT EXISTS jogadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    data_nascimento DATE NOT NULL,
    nacionalidade VARCHAR(100) NULL,
    altura DECIMAL(4,2) NULL,
    peso DECIMAL(5,2) NULL,
    pe_dominante ENUM('Esquerdo', 'Direito', 'Ambos') NULL,
    posicao ENUM('Goleiro', 'Defensor', 'Meio-campista', 'Atacante') NULL,
    time VARCHAR(100) NULL,
    imagem VARCHAR(255) DEFAULT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil VARCHAR(20) NOT NULL DEFAULT 'usuario',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO jogadores 
(nome, data_nascimento, nacionalidade, altura, peso, pe_dominante, posicao, time, imagem)
VALUES
('Lionel Messi', '1987-06-24', 'Argentina', 1.70, 72.00, 'Esquerdo', 'Atacante', 'Inter Miami', 'https://placehold.co/300x400'),
('Cristiano Ronaldo', '1985-02-05', 'Portugal', 1.87, 83.00, 'Direito', 'Atacante', 'Al Nassr', 'https://placehold.co/300x400'),
('Kylian Mbappé', '1998-12-20', 'France', 1.78, 73.00, 'Direito', 'Atacante', 'PSG', 'https://placehold.co/300x400'),
('Kevin De Bruyne', '1991-06-28', 'Belgium', 1.81, 70.00, 'Direito', 'Meio-campista', 'Manchester City', 'https://placehold.co/300x400'),
('Virgil van Dijk', '1991-07-08', 'Netherlands', 1.93, 92.00, 'Direito', 'Defensor', 'Liverpool', 'https://placehold.co/300x400'),
('Neymar Jr', '1992-02-05', 'Brazil', 1.75, 68.00, 'Direito', 'Atacante', 'Al Hilal', 'https://placehold.co/300x400'),
('Luka Modric', '1985-09-09', 'Croatia', 1.72, 66.00, 'Direito', 'Meio-campista', 'Real Madrid', 'https://placehold.co/300x400'),
('Harry Kane', '1993-07-28', 'England', 1.88, 86.00, 'Direito', 'Atacante', 'Bayern Munich', 'https://placehold.co/300x400'),
('Robert Lewandowski', '1988-08-21', 'Poland', 1.85, 81.00, 'Direito', 'Atacante', 'Barcelona', 'https://placehold.co/300x400'),
('Thibaut Courtois', '1992-05-11', 'Belgium', 2.00, 96.00, 'Esquerdo', 'Goleiro', 'Real Madrid', 'https://placehold.co/300x400'),

('Manuel Neuer', '1986-03-27', 'Germany', 1.93, 93.00, 'Direito', 'Goleiro', 'Bayern Munich', 'https://placehold.co/300x400'),
('Joshua Kimmich', '1995-02-08', 'Germany', 1.77, 75.00, 'Direito', 'Meio-campista', 'Bayern Munich', 'https://placehold.co/300x400'),
('Son Heung-min', '1992-07-08', 'South Korea', 1.83, 78.00, 'Direito', 'Atacante', 'Tottenham', 'https://placehold.co/300x400'),
('Achraf Hakimi', '1998-11-04', 'Morocco', 1.81, 73.00, 'Direito', 'Defensor', 'PSG', 'https://placehold.co/300x400'),
('Christian Pulisic', '1998-09-18', 'USA', 1.77, 70.00, 'Direito', 'Atacante', 'AC Milan', 'https://placehold.co/300x400'),
('Alphonso Davies', '2000-11-02', 'Canada', 1.85, 75.00, 'Esquerdo', 'Defensor', 'Bayern Munich', 'https://placehold.co/300x400'),
('Hirving Lozano', '1995-07-30', 'Mexico', 1.75, 70.00, 'Direito', 'Atacante', 'PSV', 'https://placehold.co/300x400'),
('Paulo Dybala', '1993-11-15', 'Argentina', 1.77, 75.00, 'Esquerdo', 'Atacante', 'Roma', 'https://placehold.co/300x400'),
('Pedri', '2002-11-25', 'Spain', 1.74, 60.00, 'Direito', 'Meio-campista', 'Barcelona', 'https://placehold.co/300x400'),
('Frenkie de Jong', '1997-05-12', 'Netherlands', 1.81, 74.00, 'Direito', 'Meio-campista', 'Barcelona', 'https://placehold.co/300x400'),

('Gavi', '2004-08-05', 'Spain', 1.73, 68.00, 'Direito', 'Meio-campista', 'Barcelona', 'https://placehold.co/300x400'),
('Bernardo Silva', '1994-08-10', 'Portugal', 1.73, 64.00, 'Esquerdo', 'Meio-campista', 'Manchester City', 'https://placehold.co/300x400'),
('Rodri', '1996-06-22', 'Spain', 1.90, 82.00, 'Direito', 'Meio-campista', 'Manchester City', 'https://placehold.co/300x400'),
('Sadio Mané', '1992-04-10', 'Senegal', 1.75, 69.00, 'Direito', 'Atacante', 'Al Nassr', 'https://placehold.co/300x400'),
('Mohamed Salah', '1992-06-15', 'Egypt', 1.75, 71.00, 'Esquerdo', 'Atacante', 'Liverpool', 'https://placehold.co/300x400'),
('Casemiro', '1992-02-23', 'Brazil', 1.85, 84.00, 'Direito', 'Meio-campista', 'Manchester United', 'https://placehold.co/300x400'),
('Marquinhos', '1994-05-14', 'Brazil', 1.83, 75.00, 'Direito', 'Defensor', 'PSG', 'https://placehold.co/300x400'),
('Antoine Griezmann', '1991-03-21', 'France', 1.76, 73.00, 'Esquerdo', 'Atacante', 'Atletico Madrid', 'https://placehold.co/300x400'),
('Bukayo Saka', '2001-09-05', 'England', 1.78, 72.00, 'Esquerdo', 'Atacante', 'Arsenal', 'https://placehold.co/300x400'),
('Declan Rice', '1999-01-14', 'England', 1.85, 80.00, 'Direito', 'Meio-campista', 'Arsenal', 'https://placehold.co/300x400'),

('Ederson', '1993-08-17', 'Brazil', 1.88, 86.00, 'Esquerdo', 'Goleiro', 'Manchester City', 'https://placehold.co/300x400'),
('Jude Bellingham', '2003-06-29', 'England', 1.86, 75.00, 'Direito', 'Meio-campista', 'Real Madrid', 'https://placehold.co/300x400'),
('Vinicius Jr', '2000-07-12', 'Brazil', 1.76, 73.00, 'Direito', 'Atacante', 'Real Madrid', 'https://placehold.co/300x400'),
('Lautaro Martínez', '1997-08-22', 'Argentina', 1.74, 72.00, 'Direito', 'Atacante', 'Inter Milan', 'https://placehold.co/300x400'),
('Romelu Lukaku', '1993-05-13', 'Belgium', 1.91, 94.00, 'Esquerdo', 'Atacante', 'Roma', 'https://placehold.co/300x400'),
('Hakim Ziyech', '1993-03-19', 'Morocco', 1.80, 65.00, 'Esquerdo', 'Atacante', 'Galatasaray', 'https://placehold.co/300x400'),
('João Félix', '1999-11-10', 'Portugal', 1.81, 70.00, 'Direito', 'Atacante', 'Barcelona', 'https://placehold.co/300x400'),
('Thomas Müller', '1989-09-13', 'Germany', 1.85, 76.00, 'Direito', 'Atacante', 'Bayern Munich', 'https://placehold.co/300x400'),
('Jan Oblak', '1993-01-07', 'Slovenia', 1.88, 87.00, 'Direito', 'Goleiro', 'Atletico Madrid', 'https://placehold.co/300x400'),
('Federico Valverde', '1998-07-22', 'Uruguay', 1.82, 78.00, 'Direito', 'Meio-campista', 'Real Madrid', 'https://placehold.co/300x400'),

('Darwin Núñez', '1999-06-24', 'Uruguay', 1.87, 81.00, 'Direito', 'Atacante', 'Liverpool', 'https://placehold.co/300x400'),
('Dusan Vlahovic', '2000-01-28', 'Serbia', 1.90, 84.00, 'Esquerdo', 'Atacante', 'Juventus', 'https://placehold.co/300x400'),
('Yassine Bounou', '1991-04-05', 'Morocco', 1.95, 78.00, 'Direito', 'Goleiro', 'Al Hilal', 'https://placehold.co/300x400'),
('Keylor Navas', '1986-12-15', 'Costa Rica', 1.85, 80.00, 'Direito', 'Goleiro', 'PSG', 'https://placehold.co/300x400'),
('Luis Díaz', '1997-01-13', 'Colombia', 1.78, 65.00, 'Direito', 'Atacante', 'Liverpool', 'https://placehold.co/300x400'),
('Serge Gnabry', '1995-07-14', 'Germany', 1.76, 77.00, 'Direito', 'Atacante', 'Bayern Munich', 'https://placehold.co/300x400'),
('Bruno Fernandes', '1994-09-08', 'Portugal', 1.79, 69.00, 'Direito', 'Meio-campista', 'Manchester United', 'https://placehold.co/300x400'),
('Phil Foden', '2000-05-28', 'England', 1.71, 70.00, 'Esquerdo', 'Meio-campista', 'Manchester City', 'https://placehold.co/300x400'),
('Gianluigi Donnarumma', '1999-02-25', 'Italy', 1.96, 90.00, 'Direito', 'Goleiro', 'PSG', 'https://placehold.co/300x400');

INSERT INTO usuarios (nome_usuario, email, senha, perfil)
VALUES ('admin', 'admin@email.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'admin');

-- admin@email.com 
-- admin123

CREATE TABLE IF NOT EXISTS empregos ();

