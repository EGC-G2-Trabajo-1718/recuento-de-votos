INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_12_03_000001_create_poll_table', 1),
('2017_12_03_000002_create_polloption_table', 1),
('2017_12_03_000003_create_user_table', 1),
('2017_12_03_000004_create_user_auth_poll_table', 1),
('2017_12_03_000005_create_vote_table', 1),
('2017_12_13_184119_create_polloption_poll_table', 1);


INSERT INTO `Poll` (`poll_id`, `title`, `results`, `result`, `begin_date`, `finish_date`, `total_voters`, `total_votes`, `question`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Votacion para el nuevo delegado de clase', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '¿Quien sera el nuevo delegado de clase para el curso 1718?', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Votacion para el color de la fachada', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '¿Quieres que cambiemos el color de la fachada?', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

INSERT INTO `Poll_Option` (`poll_option_id`, `option`) VALUES
(1, 'Juan'),
(2, 'Ana'),
(3, 'Pepe'),
(4, 'Luis'),
(5, 'Nulo'),
(6, 'Blanco'),
(7, 'Si'),
(8, 'No'),
(9, 'Nulo'),
(10, 'Blanco');
