-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 09:09 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE survey_users (
    nama_lengkap VARCHAR(255) NOT NULL,
    nim VARCHAR(255) NOT NULL,
    status_akademik ENUM('Mahasiswa Aktif', 'Cuti Studi', 'Mahasiswa Program MBKM') NOT NULL,
    tingkat_semester ENUM('Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5') NOT NULL,
    status_penerimaan_kipk ENUM('Penerima KIPK', 'Bukan Penerima KIPK') NOT NULL,
    status_penerimaan_beasiswa ENUM('Penerima Beasiswa', 'Bukan Penerima Beasiswa') NOT NULL,
    kegiatan_luarkampus VARCHAR(255) NOT NULL
);