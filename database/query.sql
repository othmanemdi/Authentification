create or replace view view_user_historique AS
SELECT 
    U.id AS user_id,
    U.nom,
    U.email,
    UH.date_connected,
    UH.ip,
    UH.plateform
 FROM user_historique UH
LEFT JOIN users U ON U.id = UH.user_id 