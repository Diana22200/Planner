SELECT 
Acronym_doc,
num_doc,
names,
surname,
score,
title,
deadline
  FROM [surrogate_keys].[document]
  INNER JOIN
 [surrogate_keys].[user]
  ON [document].id = [user].documentid
  INNER JOIN
    [surrogate_keys].[qualification]
  ON [qualification].Userid = [user].id
  INNER JOIN
    [surrogate_keys].[activity]
  ON [activity].id = [qualification].Activityid