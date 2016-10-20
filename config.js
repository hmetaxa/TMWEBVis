(function () {
    "use strict";

    // -- ACM_400T_1000IT_6000CHRs_150_40PRN100B_4M_4TH_cosNoPPR
    // -- ACM_400T_950IT_6000CHRs_150_40PRN100B_4M_4TH_cosWVNoPPR
    // -- select DISTINCT entitytype from EntityTopicDistribution;
    // -- Response: ENTITY TYPES (Author,Conference,ConferenceTrend,Corpus,CorpusTrend,funder,grant,Journal,JournalTrend)

    // graph
    exports.experiments = "SELECT DISTINCT ExperimentId as experimentId, Description as description, Metadata as metadata, InitialSimilarity as initialSimilarity, PhraseBoost as phraseBoost FROM experiment;";
    exports.graphLayout = "SELECT EntityId1 AS node1id, EntityId2 AS node2id, Author1 AS node1name, Author2 AS node2name, AC1_Category0 AS category1_1, AC1_Category0 AS category1_2, AC1_Category0 AS category1_3, AC2_Category0 AS category2_1, AC2_Category0 AS category2_2, AC2_Category0 AS category2_3, catCnts1 AS category1_counts, catCnts2 AS category2_counts, Similarity FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ?";
    exports.nodes = "SELECT Entityid AS EntityId, entityTopicDistribution.topicid as topicIds, normweight as weight FROM entityTopicDistribution INNER JOIN TopicDescription ON entityTopicDistribution.topicId = TopicDescription.topicid AND entityTopicDistribution.ExperimentId = TopicDescription.ExperimentId WHERE entityTopicDistribution.ExperimentId = ? AND BatchID = '' AND EntityType = 'Author' ORDER BY authorid, entityTopicDistribution.TopicId";
    exports.topics = "SELECT tdes.TopicId as topicId, tanal.Item as words, tdet.Weight as weight, tdes.title as title, tanal.counts as counts, tanal.ItemType as type FROM topicdescription AS tdes INNER JOIN topicdetails AS tdet ON tdes.topicid = tdet.topicid AND tdes.ExperimentId = tdet.ExperimentId AND tdes.VisibilityIndex = 2 INNER JOIN topicanalysis AS tanal ON tdes.topicid = tanal.topicid AND tdes.ExperimentId = tanal.ExperimentId WHERE tdes.ExperimentId = ?";
    // cloud
    exports.cloud = "SELECT tdes.title as title, tanal.Item as words, tanal.Counts as counts, tdes.TopicId FROM topicdescription AS tdes INNER JOIN topicanalysis AS tanal ON tdes.topicid = tanal.topicid AND tdes.ExperimentId = tanal.ExperimentId AND tdes.VisibilityIndex = 2 WHERE tdes.ExperimentId = ? AND tanal.TopicId = tdes.TopicId";
    // --      AND (tanal.TopicId = '32' OR tanal.TopicId = '34');
    // trends
    exports.journal = "SELECT BatchId as xaxis, EntityTopicDistribution.TopicId as topicId, NormWeight as weight, TopicDescription.Title as title, TopicDescription.VisibilityIndex, EntityId as ids FROM EntityTopicDistribution INNER JOIN TopicDescription ON TopicDescription.TopicId = EntityTopicDistribution.TopicId AND EntityType = 'JournalTrend' AND TopicDescription.ExperimentId=EntityTopicDistribution.ExperimentId AND VisibilityIndex=5 WHERE EntityTopicDistribution.ExperimentId = ?";
    // -- and EntityId='0163-5948'
    exports.corpus = "SELECT BatchId as xaxis,  EntityTopicDistribution.TopicId as topicId, NormWeight as weight, TopicDescription.Title as title, TopicDescription.VisibilityIndex FROM EntityTopicDistribution INNER JOIN TopicDescription ON TopicDescription.TopicId = EntityTopicDistribution.TopicId  AND TopicDescription.ExperimentId=EntityTopicDistribution.ExperimentId AND  EntityType = 'CorpusTrend' AND VisibilityIndex=5  WHERE  EntityTopicDistribution.ExperimentId = ?";

    
    exports.conference = "select xaxis, topicId,  weight ,   title, VisibilityIndex,  ids from conferencetrendview where ExperimentId = ? ";
    //"SELECT BatchId as xaxis, EntityTopicDistribution.TopicId as topicId, NormWeight as weight, TopicDescription.Title as title, TopicDescription.VisibilityIndex, EntityId as ids //FROM EntityTopicDistribution INNER JOIN TopicDescription ON TopicDescription.TopicId = EntityTopicDistribution.TopicId  EntityType = 'ConferenceTrend' AND //TopicDescription.ExperimentId=EntityTopicDistribution.ExperimentId AND VisibilityIndex=5 WHERE  EntityTopicDistribution.ExperimentId = ?";
    // -- and EntityId='SERIES402'
    // spider
    exports.authortopics = "SELECT FirstName as center, LastName as centerLast, Title as spider, normweight as weight, Entityid as centerid, entityTopicDistribution.topicid as spiderids FROM entityTopicDistribution INNER JOIN TopicDescription ON entityTopicDistribution.topicId = TopicDescription.topicid AND entityTopicDistribution.ExperimentId = TopicDescription.ExperimentId INNER JOIN Author ON entityTopicDistribution.EntityId = Author.AuthorId WHERE entityTopicDistribution.ExperimentId = ? AND BatchID = '' AND EntityType = 'Author' ";
    // -- and EntityId='81100002314'

    // the below two are used together with union. Reason: Multiple Authors. Previous query was: exports.similarauthors = "SELECT Author1 AS center, Author2 AS spider, Similarity as weight, EntityId1 AS centerid, EntityId2 AS spiderids FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ? and EntityId1=? union SELECT Author2   AS center, Author1   AS spider, Similarity as weight, EntityId2 AS centerid, EntityId1 AS spiderids FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ? and EntityId2=?";
    exports.similarauthorsPart1 = "SELECT Author1 AS center, Author2 AS spider, Similarity as weight, EntityId1 AS centerid, EntityId2 AS spiderids FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ?";
    // -- and EntityId1='81100642315'
    // -- union
    exports.similarauthorsPart2 = "SELECT Author2 AS center, Author1 AS spider, Similarity as weight, EntityId2 AS centerid, EntityId1 AS spiderids FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ?";
    // -- and EntityId2='81100642315'
    // main page queries
    // the below shows all authors in corpus but are too many
    // exports.entitiesList = "select AuthorId as id, FirstName as name, LastName as lastName, MiddleName as middleName, Affiliation as affiliation from Author";
    exports.entitiesList = "Select DISTINCT id, name, description from(SELECT DISTINCT EntityId1 AS id, Author1 AS name, AC1_Category0 AS description FROM EntitySimilarityView_Authors WHERE ExperimentId = ? and Similarity>0.6 UNION SELECT EntityId2 AS id, Author2 AS name, AC2_Category0 AS description FROM EntitySimilarityView_Authors WHERE ExperimentId = ? and Similarity>0.6)";
    exports.conferencesList = "SELECT DISTINCT entityId as id, seriesTitle as name, description as description FROM EntityTopicDistribution INNER JOIN Conference on EntityId=seriesId WHERE EntityType = 'ConferenceTrend' and EntityTopicDistribution.ExperimentId = ?";
    exports.journalsList = "SELECT DISTINCT entityId as id, title as name, title as description FROM EntityTopicDistribution INNER JOIN Journal on EntityId=ISSN WHERE EntityType = 'JournalTrend' and EntityTopicDistribution.ExperimentId = ? order by EntityId desc";
    exports.topicsList = "SELECT DISTINCT tdes.TopicId AS id, tdes.title AS name, tdes.title AS description FROM topicdescription AS tdes WHERE tdes.VisibilityIndex = 2 AND tdes.ExperimentId = ?";
})();