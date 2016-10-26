-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2015 at 04:15 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sakec`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiments`
--

CREATE TABLE IF NOT EXISTS `experiments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `aim` varchar(500) NOT NULL,
  `requirement` varchar(500) NOT NULL,
  `objective` varchar(100) NOT NULL,
  `theory` varchar(5000) DEFAULT NULL,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `experiments`
--

INSERT INTO `experiments` (`id`, `name`, `aim`, `requirement`, `objective`, `theory`, `path`) VALUES
(1, 'Pink Noise', 'To demonstrate the difference between the pink and white noise to human ears.', 'You have to install a LabVIEW in order to perform the experiment.', 'This experiment provides you to filter white noise to generate pink noise. A DSP or analogue electro', 'White noise can be produced by a stream of random numbers that is then listened to as an audio signal. "White" refers to the even distribution of wavelengths in white light, with a particular meaning in the audio or DSP sense that the power of the noise is distributed evenly over all frequencies, between 0 and some maximum frequency which is typically half the sampling rate. For example, white noise at a sampling rate of 44,100 Hz has as much power between 100 and 600 Hz as between 20,000 and 20,500 Hz. To human ears, this seems bright and harsh. \r\n\r\nIn the natural world, there are many physical processes that produce noise with what is known as a pink distribution of power. Pink noise has an even distribution of power if the frequency is mapped in a logarithmic scale. For example, there is as much noise power in the octave 200 to 400 Hz as there is in the octave 2,000 to 4,000 Hz. Consequently it seems, human ears indicate that this is a natural, even noise.\r\n\r\nPink Noise\r\nPink noise or 1 f noise (sometimes also called flicker noise) is a signal or process with a frequency spectrum such that the power spectral density(energy or power per Hz) is inversely proportional to the frequency of the signal. In pink noise, each octave (halving or doubling in frequency) carries an equal amount of noise power. The name arises from the pink appearance of visible light with this power spectrum\r\nWithin the scientific literature the term pink noise is sometimes used a little more loosely to refer     to any noise with a power spectral density of the form\r\n\r\nwhere f is frequency and 0 < a < 2, with exponent ? usually close to 1. These pink-like noises occur widely in nature and are a source of considerable interest in many fields. The distinction between the noises with ? near 1 and those with a broad range of ? approximately corresponds to a much more basic distinction. The former (narrow sense) generally come from condensed matter systems in quasi-equilibrium, as discussed below. The latter (broader sense) generally correspond to a wide range of non-equilibrium driven dynamical systems.\r\nThe term flicker noise is sometimes used to refer to pink noise, although this is more properly applied only to its occurrence in electronic devices due to a direct current. Mandelbrot and Van Ness proposed the name fractional noise (sometimes since called fractal noise) to emphasize that the exponent of the spectrum could take non-integer values and be closely related to fractional Brownian motion, but the term is very rarely used.\r\n\r\nIn signal processing, white noise is a random signal with a constant power spectral density. The term is used, with this or similar meanings, in many scientific and technical disciplines, including physics, acoustic engineering, telecommunications, statistical forecasting, and many more. White noise refers to a statistical model for signals and signal sources, rather than to any specific signal.\r\nThe term is also used for a discrete signal whose samples are regarded as a sequence of serially uncorrelated random variables with zero mean and finite variance. Depending on the context, one may also require that the samples be independent and have the same probability distribution . In particular, if each sample has a normal distribution with zero mean, the signal is said to be Gaussian white noise. \r\n\r\nProcedure:\r\n\r\nStep 1: Select the sampling noise.\r\n\r\nStep 2: Click on play noise.\r\n\r\nStep 3: Click on push button :\r\n\r\n	White noise: Select this to hear sound of white noise . \r\n	Pink noise : Select this to hear sound of pink noise . \r\n\r\nStep 4: Observe the waveform for pink and white noise .\r\n\r\nSummary:\r\n\r\nFrom the experiment, we can hear the difference between the pink noise and white noise .<br>\r\n\r\nReferences:\r\n\r\n1.	Bak, P. and Tang, C. and Wiesenfeld, K. (1987). "Self-Organized Criticality: An Explanation of 1 f Noise".\r\n2.	Matt Donadio. "How to Generate White Gaussian Noise"\r\n\r\n', 'pinknoise2.vi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$NjNlZDVhOWY4ZjQ5YzJkYOAw0Py1ZUvyteB7JVmyphYId3YGaybdu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
