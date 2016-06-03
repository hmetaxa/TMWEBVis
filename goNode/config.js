(function () {
    "use strict";

    // -- ACM_400T_1000IT_6000CHRs_150_40PRN100B_4M_4TH_cosNoPPR
    // -- ACM_400T_950IT_6000CHRs_150_40PRN100B_4M_4TH_cosWVNoPPR
    // -- select DISTINCT entitytype from EntityTopicDistribution;
    // -- Response: ENTITY TYPES (Author,Conference,ConferenceTrend,Corpus,CorpusTrend,funder,grant,Journal,JournalTrend)

// graph
    exports.experiments = "SELECT DISTINCT * FROM experiment;";
    exports.graphLayout = "SELECT EntityId1 AS node1id, EntityId2 AS node2id, Author1 AS node1name, Author2 AS node2name, AC1_Category0 AS category1_1, AC1_Category0 AS category1_2, AC1_Category0 AS category1_3, AC2_Category0 AS category2_1, AC2_Category0 AS category2_2, AC2_Category0 AS category2_3, catCnts1 AS category1_counts, catCnts2 AS category2_counts, Similarity FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ?";
    exports.nodes = "SELECT Entityid AS AuthorID, entityTopicDistribution.topicid, normweight as weight FROM entityTopicDistribution INNER JOIN TopicDescription ON entityTopicDistribution.topicId = TopicDescription.topicid AND entityTopicDistribution.ExperimentId = TopicDescription.ExperimentId WHERE entityTopicDistribution.ExperimentId = ? AND BatchID = '' AND EntityType = 'Author' ORDER BY authorid, entityTopicDistribution.TopicId";
    exports.topics = "SELECT tdes.TopicId, tanal.Item, tdet.Weight, tdes.title, tanal.counts, tanal.ItemType FROM topicdescription AS tdes INNER JOIN topicdetails AS tdet ON tdes.topicid = tdet.topicid AND tdes.ExperimentId = tdet.ExperimentId AND tdes.VisibilityIndex = 2 INNER JOIN topicanalysis AS tanal ON tdes.topicid = tanal.topicid AND tdes.ExperimentId = tanal.ExperimentId WHERE tdes.ExperimentId = ?";
// cloud
    exports.cloud = "SELECT tdes.title as title, tanal.Item as words, tanal.Counts as counts, tdes.TopicId FROM topicdescription AS tdes INNER JOIN topicanalysis AS tanal ON tdes.topicid = tanal.topicid AND tdes.ExperimentId = tanal.ExperimentId AND tdes.VisibilityIndex = 2 WHERE tdes.ExperimentId = ? AND tanal.TopicId = tdes.TopicId";
    // --      AND (tanal.TopicId = '32' OR tanal.TopicId = '34');
// trends
    exports.journal = "SELECT BatchId as xaxis, EntityTopicDistribution.TopicId as yaxis, NormWeight as weight, TopicDescription.Title as titles, TopicDescription.VisibilityIndex, EntityId as ids FROM EntityTopicDistribution INNER JOIN TopicDescription ON TopicDescription.TopicId = EntityTopicDistribution.TopicId WHERE EntityType = 'JournalTrend' AND TopicDescription.ExperimentId=EntityTopicDistribution.ExperimentId and EntityTopicDistribution.ExperimentId = ?";
    // -- and EntityId='0163-5948'
    exports.corpus = "SELECT BatchId as xaxis, EntityTopicDistribution.TopicId as yaxis, NormWeight as weight, TopicDescription.Title as titles, TopicDescription.VisibilityIndex FROM EntityTopicDistribution INNER JOIN TopicDescription ON TopicDescription.TopicId = EntityTopicDistribution.TopicId WHERE EntityType = 'CorpusTrend' AND TopicDescription.ExperimentId=EntityTopicDistribution.ExperimentId and EntityTopicDistribution.ExperimentId = ?";
    exports.conference = "SELECT BatchId as xaxis, EntityTopicDistribution.TopicId as yaxis, NormWeight as weight, TopicDescription.Title as titles, TopicDescription.VisibilityIndex, EntityId as ids FROM EntityTopicDistribution INNER JOIN TopicDescription ON TopicDescription.TopicId = EntityTopicDistribution.TopicId WHERE EntityType = 'ConferenceTrend' AND TopicDescription.ExperimentId=EntityTopicDistribution.ExperimentId and EntityTopicDistribution.ExperimentId = ?";
    // -- and EntityId='SERIES402'
// spider
    exports.authortopics = "SELECT FirstName as center, LastName as centerLast, Title as spider, normweight as weight, Entityid as centerid, entityTopicDistribution.topicid as spiderids FROM entityTopicDistribution INNER JOIN TopicDescription ON entityTopicDistribution.topicId = TopicDescription.topicid AND entityTopicDistribution.ExperimentId = TopicDescription.ExperimentId INNER JOIN Author ON entityTopicDistribution.EntityId = Author.AuthorId WHERE entityTopicDistribution.ExperimentId = ? AND BatchID = '' AND EntityType = 'Author' ";
    // -- and EntityId='81100002314'
    exports.similarauthors = "SELECT Author1 AS center, Author2 AS spider, Similarity as weight, EntityId1 AS centerid, EntityId2 AS spiderids FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ? and EntityId1=? union SELECT Author2   AS center, Author1   AS spider, Similarity as weight, EntityId2 AS centerid, EntityId1 AS spiderids FROM EntitySimilarityView_authors WHERE ExperimentId = ? AND Similarity > ? and EntityId2=?";
})();