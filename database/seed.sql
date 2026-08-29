USE indianscience;

INSERT INTO site_counters (counter_key, counter_value, label) VALUES
  ('institutions', 11, 'Institutions Covered'),
  ('years', 10, 'Years of Data'),
  ('attributes', 50, 'Attributes Computed');

INSERT INTO institutions
  (grid_id, slug, name, institution_type, year_established, city, state, description, source_note, logo_path, is_major)
VALUES
  ('grid.34980.36', 'iisc-bangalore', 'Indian Institute of Science Bangalore', 'Education', 1909, 'Bangalore', 'Karnataka',
   'The Indian Institute of Science (IISc) is a public, deemed, research university for higher education and research in science, engineering, design, and management. It was established in 1909 with active support from Jamsetji Tata.',
   'Source: Wikipedia', '/assets/img/institutions/iisc.jpg', 1),
  ('grid.417971.d', 'iit-bombay', 'Indian Institute of Technology Bombay', 'Education', 1958, 'Mumbai', 'Maharashtra',
   'IIT Bombay is a public technical university located in Powai, Mumbai, established in 1958.',
   'Source: Wikipedia', '/assets/img/institutions/iitb.jpg', 1),
  ('grid.417969.4', 'iit-madras', 'Indian Institute of Technology Madras', 'Education', 1959, 'Chennai', 'Tamil Nadu',
   'IIT Madras is a public technical university located in Chennai, established in 1959.',
   'Source: Wikipedia', '/assets/img/institutions/iitm.jpg', 1);

INSERT INTO institution_stats
  (institution_id, period_label, total_papers, total_citations, citations_per_paper, h_index, g_index, x_index, xg_index,
   icp_proportion, male_first_author_pct, female_first_author_pct, open_access_pct,
   twitter_coverage_pct, facebook_coverage_pct, mendeley_coverage_pct,
   twitter_avg_mentions, facebook_avg_mentions, mendeley_avg_mentions,
   arwu_rank, the_rank, qs_rank, leiden_rank, nirf_rank, external_data_year)
VALUES
  (1, '2010-2019', 20257, 308491, 15.23, 145, 249, 235, 365,
   25.93, 76.04, 23.96, 32.21,
   20.57, 3.84, 30.93,
   6.36, 1.64, 437.60,
   '401-500', '301-350', '185', '2', 'NA', 2021);

INSERT INTO posts (slug, title, excerpt, body, author, is_published, published_at) VALUES
  ('welcome-to-indian-science-reports', 'Welcome to Indian Science Reports',
   'An overview of what this portal tracks and why it matters.',
   '<p>Indian Science Reports is an online portal showcasing the research growth of India and its institutions between 2010 and 2019...</p>',
   'Vivek Kumar Singh', 1, NOW());

INSERT INTO publications (title, authors, url, journal, published_at, is_featured, sort_order) VALUES
  ('Patterns in the Growth and Thematic Evolution of Artificial Intelligence Research',
   'Solanki Gupta, Anurag Kanaujia, Hiran H. Lathabai, Vivek Kumar Singh, Philipp Mayr',
   'https://doi.org/10.1155/2024/5511224', NULL, '2024-01-01', 1, 1),
  ('Scholarly article retrieval from Web of Science, Scopus and Dimensions: A comparative analysis',
   'Prashasti Singh, Vivek Kumar Singh, Rajesh Piryani',
   'https://journals.sagepub.com/doi/full/10.1177/01655515231191351', NULL, '2023-06-01', 1, 2);
