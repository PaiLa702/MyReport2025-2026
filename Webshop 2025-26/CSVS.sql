-- Database
CREATE OR REPLACE DATABASE Webshop2025_26;
USE Webshop2025_26;

-- Table Structure
CREATE TABLE Products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductNameEN VARCHAR(255),
    ImageLink VARCHAR(255),
    Price DECIMAL(10,2),
    DescriptionEN TEXT,
    EffectEN TEXT,
    DescriptionPT TEXT,
    EffectPT TEXT,
    ProductNamePT VARCHAR(255)
);

CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(100) NOT NULL UNIQUE,
    DisplayName VARCHAR(100),
    Email VARCHAR(255) NOT NULL UNIQUE,
    UserPassword VARCHAR(255) NOT NULL,
    UserType VARCHAR(50) NOT NULL
);

CREATE TABLE Messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    messageText VARCHAR(255),
    username VARCHAR(100) NOT NULL,
    FOREIGN KEY (username) REFERENCES Users (Username)
);

CREATE TABLE Translations (
    TranslationKey VARCHAR(100) PRIMARY KEY,
    EnglishText TEXT NOT NULL,
    PortugueseText TEXT NOT NULL
);

-- All Translations
INSERT INTO Translations (TranslationKey, EnglishText, PortugueseText) VALUES
-- Global / Navigation
('HomeBtn', 'Home', 'Início'),
('ContactBtn', 'Contact', 'Contacto'),
('ProductBtn', 'Products', 'Produtos'),
('RegisterBtn', 'Register', 'Registar'),
('LoginBtn', 'Login', 'Iniciar Sessão'),
('LogoutBtn', 'Logout', 'Sair'),
('AdminBtn', 'Admin Panel', 'Painel de Admin'),
('WelcomeLabel', 'Welcome, ', 'Bem-vindo, '),
('AdminPurchaseDisabled', 'Admin View: Purchase Disabled', 'Vista de Admin: Compra Desativada'),
('LoginToPurchase', 'Login to Purchase', 'Entre para Comprar'),

-- Home Page
('HomeTitle', 'Welcome to the Pixel Potion Shop!', 'Bem-vindo à Loja de Poções Pixel!'),
('HomeText', 'Step into a world where magic fizzes in glass bottles and every pixel sparkles with possibility. Whether you need motivation for Mondays, courage for your next adventure, or a quick excuse for that “forgotten” homework, our handcrafted potions are brewed with care and humor.', 'Entre num mundo onde a magia borbulha em frascos de vidro e cada pixel brilha com possibilidades. Quer precise de motivação para as segundas-feiras, coragem para a sua próxima aventura, ou uma desculpa rápida para aquele trabalho de casa "esquecido", as nossas poções são preparadas com cuidado.'),

-- Products Page
('ProductTitle', 'Our Products', 'Os Nossos Produtos'),
('BuyBtn', 'Buy', 'Comprar'),

-- Contact Page
('ContactTitle', 'Contact the Potion Master', 'Contacte o Mestre das Poções'),
('ContactText', 'Need help with your order or a custom brew idea? Send us a message below!', 'Precisa de ajuda com a sua encomenda ou uma ideia de mistura? Envie-nos uma mensagem abaixo!'),
('ContactLabel1', 'Adventurer Name:', 'Nome do Aventureiro:'),
('ContactLabel2', 'Raven Address (Email):', 'Endereço do Corvo (Email):'),
('ContactLabel3', 'Potion Inquiry:', 'Consulta sobre Poção:'),
('ContactLabel4', 'Your Message:', 'A Sua Mensagem:'),
('ContactSendBtn', 'Send Your Scroll ✉️', 'Enviar o Seu Pergaminho ✉️'),
('ContactPlaceholder1', 'e.g., Merlin', 'ex., Merlin'),
('ContactPlaceholder2', 'you@example.com', 'você@exemplo.com'),
('ContactPlaceholder3', 'Which potion calls to you?', 'Qual poção o chama?'),
('ContactPlaceholder4', 'Type your message...', 'Digite a sua mensagem...'),
('ContactEmailRegistration', 'potionMaster001@magicmail.com', 'potionMaster001@magicmail.com'),
('ContactAddress', '123 Alchemy Lane, Potionville', '123 Rua da Alquimia, Vila das Poções'),
('ContactLocation', 'Potionville, Enchanted Forest', 'Vila das Poções, Floresta Encantada'),

-- Registration Page 
('RegisterTitle', 'Register as an Apprentice Brewer', 'Registe-se como Aprendiz de fabricante de poções'),
('RegisterText', 'Join the guild and start your potion-making journey!', 'Junte-se à guilda e comece a sua jornada na fabricação de poções!'),
('RegisterUsername', 'Adventurer Name:', 'Nome do Aventureiro:'),
('RegisterEmail', 'Raven Address (Email):', 'Endereço do Corvo (Email):'),
('RegisterSecretPassword', 'Secret Word (Password):', 'Palavra Secreta (Senha):'),
('RegisterSecretPasswordRepeat', 'Repeat Secret Word:', 'Repita a Palavra Secreta:'),
('RegisterPageButton', 'Join the Guild! ✨', 'Junte-se à Guilda! ✨'),
('DisplayName', 'Display Name (Public):', 'Nome de Exibição (Público):'),
('RegisterUsernamePlaceholder', 'e.g., Merlin', 'ex., Merlin'),
('RegisterEmailPlaceholder', 'you@example.com', 'tu@exemplo.com'),
('DisplayNamePlaceholder', 'Your public name in the guild', 'O seu nome público na guilda'),

-- Login Page
('LoginTitle', 'Login to your magic account', 'Inicie sessão na sua conta mágica'),
('LoginUsername', 'Username', 'Nome de Utilizador'),
('LoginUsernameEnter', 'Enter your username', 'Digite seu nome de utilizador'),
('LoginPassword', 'Password', 'Senha'),
('LoginPasswordEnter', 'Enter your secret word', 'Digite sua palavra secreta'),
('LoginMessageSuccess', 'You are logged in, mighty alchemist!', 'Você está conectado, poderoso alquimista!'),
('LoginMessageError', 'Invalid username or password.', 'Nome de utilizador ou senha inválidos.'),
('LoginButton', 'Login', 'Iniciar Sessão'),

-- Shop Cart Page
('ShopCartTitle', 'Your Alchemy Satchel', 'Conteúdo do Carrinho'),
('CartEmptyMsg', 'Your satchel is empty, traveler...', 'O teu alforge está vazio, viajante...'),
('CartReturnBtn', 'Return to Shop', 'Voltar à Loja'),
('CartTablePotion', 'POTION', 'POÇÃO'),
('CartTableQty', 'QTY', 'QTD'),
('CartTablePrice', 'PRICE', 'PREÇO'),
('CartTableAction', 'ACTION', 'AÇÃO'),
('CartGrandTotal', 'GRAND TOTAL', 'TOTAL GERAL'),
('CartContinueBtn', 'Continue Shopping', 'Continuar a Comprar'),
('CartFinalizeBtn', 'Finalize Order', 'Finalizar Encomenda'),

-- Forum Page
('ForumTitle', 'Guild Forum', 'Fórum da Guilda'),
('ForumBtn', 'Forum', 'Fórum'),
('ForumPlaceholder', 'Share your wisdom...', 'Partilha a tua sabedoria...'),
('ForumPostBtn', 'POST', 'POSTAR'),
('ForumNoMessages', 'No scrolls found... be the first to speak!', 'Nenhum pergaminho encontrado... sê o primeiro!'),
('ForumLoginRequired', 'Only registered members may post. Please Login.', 'Apenas membros registados podem postar. Faça Login.');

-- Default Data
INSERT INTO Users (Username, DisplayName, Email, UserPassword, UserType) VALUES
('bib','bib','bib@gmail.com','$2y$10$ngp3A7AySsBFgdtZtdnLEeNkr4nUXB4s0yPEsyDkiiNe5qLR7USiu','regular'),
('larissa','issa','issa@gmail.com','$2y$10$iENtggjXpIB7wy/4OHsqueb.zQJlaO26nq7oWdJOy0w8ZbGJMhAlm','Admin');

-- Products
INSERT INTO Products 
(ProductNameEN, ImageLink, Price, DescriptionEN, EffectEN, DescriptionPT, EffectPT, ProductNamePT)
VALUES
('Potion of Monday Motivation','Potion_Motivation.png',14.00,'Bright orange energy potion. Smells like coffee and broken dreams.','Temporarily removes urge to go back to bed.','Poção energética laranja brilhante. Cheira a café e sonhos partidos.','Remove temporariamente a vontade de voltar para a cama.','Poção de Motivação de Segunda-feira'),
('Late Homework Forgiveness Potion','Potion_Forgiveness.png',16.00,'Purple potion that comes with a fake excuse scroll tied to the bottle.','Won''t actually help, but might make your teacher laugh.','Poção roxa com um pergaminho de desculpa falsa.','Não vai realmente ajudar, mas pode fazer o seu professor rir.','Poção de Perdão de Tarefas Atrasadas'),
('Anger Management Vial','Anger_Vial.png',22.00,'A shimmering red potion that clears distractions and boosts concentration.','Lets you study for hours without checking your phone (well… almost).','Uma poção vermelha cintilante que elimina distrações e aumenta a concentração.','Permite estudar por horas sem verificar o celular (bem... quase).','Frasco de Gestão de Raiva'),
('Potion of Infinite Focus','Potion_Focus.png',12.00,'Bright blue energy potion. Smells like coffee and broken dreams.','Temporarily removes urge to go back to bed.','Poção azul brilhante que cheira a café e sonhos partidos.','Remove temporariamente a vontade de voltar para a cama.','Poção de Foco Infinito'),
('Confidence Elixir','Confidence_Elixir.png',18.00,'A bright golden liquid that radiates warmth.','Temporarily boosts self-esteem — perfect before presentations or first dates.','Um líquido dourado brilhante que irradia calor.','Aumenta temporariamente a autoestima — perfeito antes de apresentações ou primeiros encontros.','Elixir de Confiança'),
('Potion of Eternal Procrastination','Potion_Procrastination.png',29.00,'A swirling teal and purple mixture that looks lazy just sitting there.','Makes you feel productive while achieving absolutely nothing.','Uma mistura turquesa e roxa que parece preguiçosa só de estar ali.','Faz você se sentir produtivo sem realizar absolutamente nada.','Poção da Procrastinação Eterna'),
('Pibble','pibble_400.png',0.10,'Cute little pibble','Cures depression','Pequeno fofinho pibble','Cura depressao','Pibble'),
('Tung Tung Sahur','Tung-Tung-Tung-Sahur-PNG-Photo-HQ.png',0.20,'A stick who will beat you with another stick','Will knock you out cold for an amazing night sleep. Perfect for people with insomnia.','Um pau que vai bater em ti com outro pau','Vai deixar-te completamente adormecido para uma noite de sono incrível. Perfeito para pessoas com insónia.','Tung Tung Sahur'),
('Invisible Rock','empty-transparent.png',0.30,'A completely invisible rock. You definitely have it. Trust us.','Prevents burglars because they cannot steal what they cannot see.','Uma pedra completamente invisível. Ela está aí. Confia.','Previne assaltos porque eles não podem roubar o que não conseguem ver.','Pedra Invisível');

select * from Products;
select * from Users;
select * from Translations;