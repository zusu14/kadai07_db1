-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2025 年 7 月 04 日 20:54
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai07_db1`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `commented_at` datetime NOT NULL,
  `kadai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `comment`
--

INSERT INTO `comment` (`id`, `nickname`, `comment`, `commented_at`, `kadai_id`) VALUES
(1, 'ハンガー', '掛けやすい', '2025-07-01 21:59:48', 1),
(2, 'いす', '低い', '2025-07-01 22:01:15', 2),
(3, 'バガス', 'すばらしい', '2025-07-03 06:49:47', 2),
(6, 'Koh', 'じゃんけん勝った', '2025-07-03 07:44:33', 2),
(7, 'Koh', 'じゃんけん勝った', '2025-07-03 07:44:44', 2),
(8, 'Davis', 'Dyson', '2025-07-03 07:45:23', 2),
(9, 'ひで', '\r\n', '2025-07-03 07:46:21', 2),
(10, 'ひで', '朝ごはん\r\n何食べよう', '2025-07-03 07:46:50', 2),
(11, 'ハム', 'チーズ', '2025-07-03 07:58:44', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `developer`
--

CREATE TABLE `developer` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `developer`
--

INSERT INTO `developer` (`id`, `name`) VALUES
(1, 'ずす');

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai`
--

CREATE TABLE `kadai` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `repositoryUrl` text NOT NULL,
  `deployUrl` text NOT NULL,
  `developer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `kadai`
--

INSERT INTO `kadai` (`id`, `title`, `repositoryUrl`, `deployUrl`, `developer_id`) VALUES
(1, 'kadai00_cheese / チーズアカデミー LP', 'https://github.com/zusu14/kadai00_cheese', 'https://zusu14.github.io/kadai00_cheese/', 1),
(2, 'kadai01_janken / 終わりなきCDジャケットクイズ', 'https://github.com/zusu14/kadai01_janken', 'https://zusu14.github.io/kadai01_janken/', 1),
(3, 'kadai02_janken_rich / イントロクイズ', 'https://github.com/zusu14/kadai02_janken_rich-3', 'https://zusu14.github.io/kadai02_janken_rich/', 1),
(4, 'kadai03_memo / フライング・ラプター', 'https://github.com/zusu14/kadai03_memo', 'https://zusu14.github.io/kadai03_memo/', 1),
(5, 'kadai04_chat / Co-Sketch', 'https://github.com/zusu14/kadai04_chat', 'https://zusu14.github.io/kadai04_chat/', 1),
(6, 'kadai05_api / Astronomy Picture of the Day（NASA API）', 'https://github.com/zusu14/kadai05_api', 'https://zusu14.github.io/kadai05_api/', 1),
(7, 'kadai06_basic_php / 掲示板サイト', 'https://github.com/zusu14/kadai06_basic_php', 'https://zusu.sakura.ne.jp/kadai06_basic_php/', 1),
(8, 'kadai07_db1 / 掲示板サイトv2', 'https://github.com/zusu14/kadai07_db1', 'https://zusu.sakura.ne.jp/gs/kadai07_db1/kadai_list.php', 1);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `kadai`
--
ALTER TABLE `kadai`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `kadai`
--
ALTER TABLE `kadai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
