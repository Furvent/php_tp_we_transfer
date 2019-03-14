SELECT utilisateur.id
FROM utilisateur
	WHERE utilisateur.login = "bob";
    
SELECT *
FROM file
INNER JOIN utilisateur
	ON utilisateur.id = file.id_utilisateur
    WHERE id_utilisateur = 2;
SELECT utilisateur.mdp
FROM utilisateur
	WHERE utilisateur.id = 1;
SELECT *
FROM utilisateur
	WHERE utilisateur.id = 1;