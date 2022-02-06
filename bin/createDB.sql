CREATE DATABASE php_mvc;

USE php_mvc;

CREATE TABLE anotacoes
(
  id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(200),
  texto TEXT,
  imagem VARCHAR(100),
  PRIMARY KEY (id)
);

INSERT INTO anotacoes (titulo, texto) VALUES
(
  "Contas",
  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sollicitudin, felis sed porta pretium, felis turpis blandit turpis, non congue leo justo nec risus. Ut malesuada sollicitudin mi imperdiet lobortis. Aenean tincidunt libero libero, id mattis ligula efficitur quis. Nam elementum enim lectus, a feugiat urna tristique malesuada. Vivamus venenatis mollis ullamcorper. Etiam ac ullamcorper dui. Nunc mauris purus, mollis nec porttitor in, mollis sed augue. Curabitur dignissim interdum leo."
),
(
  "Férias",
  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sollicitudin, felis sed porta pretium, felis turpis blandit turpis, non congue leo justo nec risus. Ut malesuada sollicitudin mi imperdiet lobortis. Aenean tincidunt libero libero, id mattis ligula efficitur quis. Nam elementum enim lectus, a feugiat urna tristique malesuada. Vivamus venenatis mollis ullamcorper. Etiam ac ullamcorper dui. Nunc mauris purus, mollis nec porttitor in, mollis sed augue. Curabitur dignissim interdum leo."
),
(
  "Carros",
  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sollicitudin, felis sed porta pretium, felis turpis blandit turpis, non congue leo justo nec risus. Ut malesuada sollicitudin mi imperdiet lobortis. Aenean tincidunt libero libero, id mattis ligula efficitur quis. Nam elementum enim lectus, a feugiat urna tristique malesuada. Vivamus venenatis mollis ullamcorper. Etiam ac ullamcorper dui. Nunc mauris purus, mollis nec porttitor in, mollis sed augue. Curabitur dignissim interdum leo."
),
(
  "Material",
  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sollicitudin, felis sed porta pretium, felis turpis blandit turpis, non congue leo justo nec risus. Ut malesuada sollicitudin mi imperdiet lobortis. Aenean tincidunt libero libero, id mattis ligula efficitur quis. Nam elementum enim lectus, a feugiat urna tristique malesuada. Vivamus venenatis mollis ullamcorper. Etiam ac ullamcorper dui. Nunc mauris purus, mollis nec porttitor in, mollis sed augue. Curabitur dignissim interdum leo."
),
(
  "Material de construção",
  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sollicitudin, felis sed porta pretium, felis turpis blandit turpis, non congue leo justo nec risus. Ut malesuada sollicitudin mi imperdiet lobortis. Aenean tincidunt libero libero, id mattis ligula efficitur quis. Nam elementum enim lectus, a feugiat urna tristique malesuada. Vivamus venenatis mollis ullamcorper. Etiam ac ullamcorper dui. Nunc mauris purus, mollis nec porttitor in, mollis sed augue. Curabitur dignissim interdum leo."
),
(
  "Família",
  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sollicitudin, felis sed porta pretium, felis turpis blandit turpis, non congue leo justo nec risus. Ut malesuada sollicitudin mi imperdiet lobortis. Aenean tincidunt libero libero, id mattis ligula efficitur quis. Nam elementum enim lectus, a feugiat urna tristique malesuada. Vivamus venenatis mollis ullamcorper. Etiam ac ullamcorper dui. Nunc mauris purus, mollis nec porttitor in, mollis sed augue. Curabitur dignissim interdum leo."
);

GRANT ALL PRIVILEGES ON php_mvc.* TO 'gabriel'@'localhost';
