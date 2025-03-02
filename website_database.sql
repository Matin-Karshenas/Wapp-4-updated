-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2025 at 05:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_table`
--

CREATE TABLE `data_table` (
  `ROW` int(11) NOT NULL,
  `DATA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_table`
--

INSERT INTO `data_table` (`ROW`, `DATA`) VALUES
(1, 'Donald Trump’s educational journey began with his early schooling in Queens, New York. As a child, he attended the Kew-Forest School, a private institution. Trump’s academic path took a notable turn when he enrolled at the New York Military Academy at the age of 13, a move his parents made to help him channel his energy and discipline. At the academy, he excelled both academically and in leadership roles. Trump later attended Fordham University in New York City for two years before transferring to the Wharton School at the University of Pennsylvania, where he completed a Bachelor of Science in Economics. His time at Wharton is often emphasized by Trump himself as a highlight of his academic career.</p> <p>Trump’s education provided him with a foundation in business, which he later leveraged in his real estate empire. Upon graduating in 1968, he entered the workforce and began working for his father’s real estate business, eventually taking over and transforming it into the global brand we know today. While his academic achievements may not have been as traditional or prestigious as some, Trump’s experience in business and leadership is often linked to his education. His success in both business and politics suggests that his educational background was a key influence in shaping his career. <a href=\"#work\">More about his work</a>.</p> <p>Throughout his life, Trump has continued to advocate for education reform, especially in the realm of school choice. As a political figure, he has voiced support for charter schools and the expansion of school choice programs. Despite criticism of his personal academic history, Trump has used his education to promote policies that reflect his values around entrepreneurship, competition, and personal freedom. In non-academic settings, his public speeches often reference the value of practical knowledge and hands-on experience, which he believes are as crucial as formal education in achieving success.'),
(2, 'Donald Trump’s entry into the business world was largely influenced by his father, Fred Trump, who was a successful real estate developer. After completing his education, Trump joined his father’s company, the Trump Organization, in 1968. Initially, he worked on small-scale residential projects in Brooklyn and Queens, New York, areas where Fred Trump had established a strong reputation. Over time, Donald began to push for more ambitious ventures, focusing on larger, high-profile developments in Manhattan. His first significant project was the transformation of the Commodore Hotel into the Grand Hyatt, which was completed in 1980. This success marked the beginning of his rise in the New York real estate scene.</p> <p>As Trump grew his business, he focused on the luxury market, branding himself as a bold, high-risk, high-reward entrepreneur. His aggressive approach to real estate, paired with his flair for self-promotion, allowed him to expand into hotels, casinos, and office buildings, solidifying his status as a prominent businessman. While his early years in business were challenging, involving multiple financial setbacks, Trump’s persistence and calculated risks ultimately led him to success. He made strategic moves, such as acquiring properties in prime locations and leveraging his public persona to draw attention to his projects.</p> <p>Throughout his career, Trump built a reputation for being a dealmaker, taking on massive projects and securing financing through partnerships and investors. His ability to navigate complex deals and his focus on marketing his name and brand were crucial elements in his rise to prominence. By leveraging his father\'s initial business empire, as well as his own determination and innovative ideas, Donald Trump was able to carve out a distinctive niche in the competitive world of real estate. His entrepreneurial journey reflects both his ambition and his confidence in taking calculated risks to achieve success.'),
(3, 'Donald Trump’s presidency, which began on January 20, 2017, was marked by bold policies and a nontraditional approach to governance. From the outset, Trump focused on implementing his campaign promises, such as reducing taxes, deregulating industries, and focusing on an \"America First\" agenda. His administration pushed for significant tax cuts, with the Tax Cuts and Jobs Act of 2017 being one of his major legislative accomplishments. Trump\'s approach to the economy was centered on boosting American jobs, bringing manufacturing back to the U.S., and renegotiating trade deals like the North American Free Trade Agreement (NAFTA), which was replaced by the United States-Mexico-Canada Agreement (USMCA).</p> <p>Throughout his presidency, Trump’s policies and rhetoric often sparked controversy, but he remained committed to his principles of nationalism and populism. His stance on immigration, characterized by building a wall along the southern border and restricting immigration policies, was one of the most divisive issues of his tenure. Trump also focused heavily on judicial appointments, successfully confirming three Supreme Court justices and numerous lower court judges, reshaping the judiciary for generations. His foreign policy saw a mix of confrontational diplomacy, such as with North Korea and Iran, alongside efforts to strengthen ties with countries like Israel and several European allies.</p> <p>Trump’s presidency faced significant challenges, including the impeachment proceedings in 2019, where he was impeached by the House of Representatives but acquitted by the Senate. The global COVID-19 pandemic in 2020 further tested his leadership, with the administration\'s response to the crisis being a focal point of debate. Despite these challenges, Trump maintained a dedicated base of supporters who appreciated his outsider status, economic policies, and tough stance on immigration and trade. By the end of his presidency in 2021, Trump had fundamentally altered the political landscape, leaving a lasting impact on both domestic and foreign policy. His time in office remains a topic of intense debate and analysis, with his legacy continuing to influence American politics.'),
(4, 'Donald Trump’s life has been one marked by ambition, controversy, and significant achievements across various fields. Born on June 14, 1946, in Queens, New York, Trump grew up in a family that was already established in the real estate business. His father, Fred Trump, was a successful real estate developer, which influenced Donald’s early interest in business. Throughout his life, Trump has been a prominent figure in the worlds of business, entertainment, and politics. He is perhaps best known for his role as a real estate mogul and for hosting the reality television show *The Apprentice*, which significantly boosted his public image.</p> <p>Trump’s personal life has also been widely publicized. He has been married three times and has five children. His first marriage to Ivana Zelníčková in 1977 ended in divorce in 1992, and he later married Marla Maples in 1993, a marriage that also ended in divorce in 1999. In 2005, he married Melania Knauss, a former model, with whom he has one son, Barron. Trump’s family has often been involved in his business ventures, with his children playing significant roles within the Trump Organization. His personal life, marked by high-profile relationships and frequent media attention, has remained a key aspect of his public persona.</p> <p>Beyond business and media, Trump has maintained a complex relationship with politics. Initially, he was not deeply involved in the political sphere, but over time, he became a more vocal figure. In 2015, he announced his candidacy for president as a Republican, and within a short time, he became a force to be reckoned with in American politics. Despite his divisive nature, Trump’s life is characterized by his ability to adapt and succeed in multiple domains, from real estate and television to the highest office in the land. His life story continues to influence and inspire debates across politics, media, and culture');

-- --------------------------------------------------------

--
-- Table structure for table `new_data`
--

CREATE TABLE `new_data` (
  `row` int(11) NOT NULL,
  `image` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_data`
--

INSERT INTO `new_data` (`row`, `image`, `text`) VALUES
(22, 'images/pic3.jpg', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`Name`, `Email`, `Password`) VALUES
('Alex', 'alex@gmail.com', 'alex_big_dick'),
('JohnyBigDick', 'Johnysins@gmail.com', '12inchdick'),
('JohnyBigDick', 'Johnysins@gmail.com', '12inchdick'),
('Bigbig', 'Johnysins@gmail.com', '12inchdick'),
('Bigbig', 'Johnysins@gmail.com', '12inchdick'),
('sexy_black', 'blackmanisangry@gmail.com', 'blackdickis20inch'),
('', '', ''),
('HelloName', 'HelloName@gmail.com', 'hello22'),
('', '', ''),
('Jack', 'Jackss12@gmail.com', 'jack1254'),
('', '', ''),
('MyNword', 'MyNword@gmail.com', 'MyNwordPassword'),
('MR_FANSERVICE', 'FANSERVICE@GMAIL.COM', 'FANSERVICE'),
('SOS', 'SOS@GMAIL.COM', 'SOSPASSWORD'),
('Johny_sins', 'Johny_sins@gmail.com', 'Johny_sins'),
('Johny_sins', 'Johny_sins@gmail.com', 'Johny_sins'),
('Johny_sins', 'Johny_sins@gmail.com', 'Johny_sins'),
('Johny_sins', 'Johny_sins@gmail.com', 'Johny_sins');

-- --------------------------------------------------------

--
-- Table structure for table `website_data`
--

CREATE TABLE `website_data` (
  `Readable` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_data`
--

INSERT INTO `website_data` (`Readable`) VALUES
('Donald Trump’s educational journey began with his early schooling in Queens, New York. As a child, he attended the Kew-Forest School, a private institution. Trump’s academic path took a notable turn when he enrolled at the New York Military Academy at the age of 13, a move his parents made to help him channel his energy and discipline. At the academy, he excelled both academically and in leadership roles. Trump later attended Fordham University in New York City for two years before transferring to the Wharton School at the University of Pennsylvania, where he completed a Bachelor of Science in Economics. His time at Wharton is often emphasized by Trump himself as a highlight of his academic career.</p> <p>Trump’s education provided him with a foundation in business, which he later leveraged in his real estate empire. Upon graduating in 1968, he entered the workforce and began working for his father’s real estate business, eventually taking over and transforming it into the global brand we know today. While his academic achievements may not have been as traditional or prestigious as some, Trump’s experience in business and leadership is often linked to his education. His success in both business and politics suggests that his educational background was a key influence in shaping his career. <a href=\"#work\">More about his work</a>.</p> <p>Throughout his life, Trump has continued to advocate for education reform, especially in the realm of school choice. As a political figure, he has voiced support for charter schools and the expansion of school choice programs. Despite criticism of his personal academic history, Trump has used his education to promote policies that reflect his values around entrepreneurship, competition, and personal freedom. In non-academic settings, his public speeches often reference the value of practical knowledge and hands-on experience, which he believes are as crucial as formal education in achieving success.'),
('Donald Trump’s educational journey began with his early schooling in Queens, New York. As a child, he attended the Kew-Forest School, a private institution. Trump’s academic path took a notable turn when he enrolled at the New York Military Academy at the age of 13, a move his parents made to help him channel his energy and discipline. At the academy, he excelled both academically and in leadership roles. Trump later attended Fordham University in New York City for two years before transferring to the Wharton School at the University of Pennsylvania, where he completed a Bachelor of Science in Economics. His time at Wharton is often emphasized by Trump himself as a highlight of his academic career.</p> <p>Trump’s education provided him with a foundation in business, which he later leveraged in his real estate empire. Upon graduating in 1968, he entered the workforce and began working for his father’s real estate business, eventually taking over and transforming it into the global brand we know today. While his academic achievements may not have been as traditional or prestigious as some, Trump’s experience in business and leadership is often linked to his education. His success in both business and politics suggests that his educational background was a key influence in shaping his career. <a href=\"#work\">More about his work</a>.</p> <p>Throughout his life, Trump has continued to advocate for education reform, especially in the realm of school choice. As a political figure, he has voiced support for charter schools and the expansion of school choice programs. Despite criticism of his personal academic history, Trump has used his education to promote policies that reflect his values around entrepreneurship, competition, and personal freedom. In non-academic settings, his public speeches often reference the value of practical knowledge and hands-on experience, which he believes are as crucial as formal education in achieving success.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_table`
--
ALTER TABLE `data_table`
  ADD PRIMARY KEY (`ROW`);

--
-- Indexes for table `new_data`
--
ALTER TABLE `new_data`
  ADD PRIMARY KEY (`row`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_table`
--
ALTER TABLE `data_table`
  MODIFY `ROW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_data`
--
ALTER TABLE `new_data`
  MODIFY `row` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
